<?php

namespace App\Imports;

use App\Models\Question;
use App\Models\CourseSection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class QuestionsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $courseSection = CourseSection::where('title', $row['course_section_title'])->first();

        if (!$courseSection) {
            return null; // Skip row if course section not found
        }

        return new Question([
            'course_section_id' => $courseSection->id,
            'question'          => $row['question'],
            'choices'           => json_decode($row['choices'], true),
            'correct_answer'    => $row['correct_answer'],
            // 'audio_url' is removed as per our new plan
        ]);
    }

    /**
     * Define validation rules for each row.
     */
    public function rules(): array
    {
        return [
            'course_section_title' => [
                'required',
                'string',
                Rule::exists('course_sections', 'title'),
            ],
            'question' => 'required|string|max:1000',
            'choices' => 'required|json',
            'correct_answer' => 'required|string|max:255',
            // 'audio_url' validation removed
        ];
    }

    /**
     * Custom validation messages (optional).
     */
    public function customValidationMessages()
    {
        return [
            'course_section_title.exists' => 'The provided Course Section Title does not exist in the database.',
            'choices.json' => 'The choices column must be a valid JSON array string (e.g., ["Option 1", "Option 2"]).',
        ];
    }
}
