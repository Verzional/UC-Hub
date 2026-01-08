<?php

namespace App\Services;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Collection;

class JobRecommendationService
{
    /**
     * Recommend jobs for a given user.
     *
     * Match score algorithm:
     * - 50% based on skill matching (user skills vs job required skills)
     * - 30% based on primary interest matching (user's interest vs company industry)
     * - 20% based on CGPA performance
     *
     * @return \Illuminate\Support\Collection<int, array{job: \App\Models\Job, score: float}>
     */
    public function recommendForUser(User $user, int $limit = 10): Collection
    {
        // Get user's skills
        $userSkillIds = $user->skills()->pluck('skills.id')->all();
        
        // Get user's survey data
        $userSurvey = $user->survey;
        $userPrimaryInterest = $userSurvey ? strtolower(trim($userSurvey->primary_interest)) : null;
        
        // Normalize CGPA to [0, 1]
        $cgpaNormalized = $userSurvey ? min(max($userSurvey->cgpa / 4.0, 0), 1) : 0.5;

        // Eager-load skills and company for all jobs
        $jobs = Job::with(['skills', 'company'])->get();

        $scored = $jobs->map(function (Job $job) use ($userSkillIds, $userPrimaryInterest, $cgpaNormalized) {
            $jobSkillIds = $job->skills->pluck('id')->all();
            
            // 1. Calculate skill match score (0-1)
            $skillMatchScore = 0;
            if (!empty($userSkillIds) && !empty($jobSkillIds)) {
                $matchedSkillCount = count(array_intersect($userSkillIds, $jobSkillIds));
                $skillMatchScore = $matchedSkillCount / count($jobSkillIds);
            }
            
            // 2. Calculate primary interest match score (0-1)
            $interestMatchScore = 0;
            if ($userPrimaryInterest && $job->company && $job->company->industry) {
                $companyIndustry = strtolower(trim($job->company->industry));
                // Exact match
                if ($userPrimaryInterest === $companyIndustry) {
                    $interestMatchScore = 1.0;
                }
                // Partial match (contains)
                elseif (str_contains($companyIndustry, $userPrimaryInterest) || 
                        str_contains($userPrimaryInterest, $companyIndustry)) {
                    $interestMatchScore = 0.7;
                }
            }
            
            // 3. Calculate final weighted score
            // 50% skill match + 30% interest match + 20% CGPA
            $finalScore = (
                0.50 * $skillMatchScore +
                0.30 * $interestMatchScore +
                0.20 * $cgpaNormalized
            ) * 100;

            return [
                'job' => $job,
                'score' => round($finalScore, 2),
            ];
        });

        return $scored
            ->sortByDesc('score')
            ->take($limit)
            ->values();
    }
}
