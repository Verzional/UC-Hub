<?php

namespace App\Services;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Collection;

class StudentRecommendationService
{
    /**
     * Recommend students for a given job.
     *
     * Match score algorithm (reverse of JobRecommendationService):
     * - 50% based on skill matching (job required skills vs student skills)
     * - 30% based on primary interest matching (company industry vs student's interest)
     * - 20% based on student CGPA performance
     *
     * @return \Illuminate\Support\Collection<int, array{student: \App\Models\User, score: float, matching_skills: array}>
     */
    public function recommendForJob(Job $job, int $limit = 10): Collection
    {
        // Get job's required skills
        $jobSkillIds = $job->skills()->pluck('skills.id')->all();
        $jobSkills = $job->skills;
        
        // Get company industry
        $companyIndustry = $job->company ? strtolower(trim($job->company->industry)) : null;

        // Get all students with their skills and survey
        $students = User::query()
            ->where('role', 'student')
            ->with(['skills', 'survey'])
            ->get();

        $scored = $students->map(function (User $student) use ($jobSkillIds, $jobSkills, $companyIndustry) {
            $studentSkillIds = $student->skills->pluck('id')->all();
            
            // 1. Calculate skill match score (0-1)
            $skillMatchScore = 0;
            $matchingSkills = [];
            if (!empty($jobSkillIds) && !empty($studentSkillIds)) {
                $matchedSkillIds = array_intersect($jobSkillIds, $studentSkillIds);
                $matchedSkillCount = count($matchedSkillIds);
                $skillMatchScore = $matchedSkillCount / count($jobSkillIds);
                
                // Get matching skill names
                $matchingSkills = $jobSkills->whereIn('id', $matchedSkillIds)->pluck('name')->all();
            }
            
            // 2. Calculate primary interest match score (0-1)
            $interestMatchScore = 0;
            $studentSurvey = $student->survey;
            if ($studentSurvey && $studentSurvey->primary_interest && $companyIndustry) {
                $studentInterest = strtolower(trim($studentSurvey->primary_interest));
                // Exact match
                if ($studentInterest === $companyIndustry) {
                    $interestMatchScore = 1.0;
                }
                // Partial match (contains)
                elseif (str_contains($companyIndustry, $studentInterest) || 
                        str_contains($studentInterest, $companyIndustry)) {
                    $interestMatchScore = 0.7;
                }
            }
            
            // 3. Normalize CGPA to [0, 1]
            $cgpaNormalized = $studentSurvey ? min(max($studentSurvey->cgpa / 4.0, 0), 1) : 0.5;
            
            // 4. Calculate final weighted score
            // 50% skill match + 30% interest match + 20% CGPA
            $finalScore = (
                0.50 * $skillMatchScore +
                0.30 * $interestMatchScore +
                0.20 * $cgpaNormalized
            ) * 100;

            return [
                'student' => $student,
                'score' => round($finalScore, 2),
                'matching_skills' => $matchingSkills,
            ];
        });

        return $scored
            ->sortByDesc('score')
            ->take($limit)
            ->values();
    }
}
