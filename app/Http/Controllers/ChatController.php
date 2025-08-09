<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    /**
     * Handle the chat request and get a response from the Gemini API.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function chat(Request $request)
    {
        // Get the prompt from the request
        $prompt = $request->input('prompt');

        // Make sure the API key is available
        $apiKey = config('services.gemini.key');
        if (empty($apiKey)) {
            Log::error('Gemini API Key is not set in the .env file.');
            return response()->json(['error' => 'Gemini API key is missing.'], 500);
        }

        try {
            // Make the API call to Gemini
            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-preview-05-20:generateContent?key={$apiKey}", [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ]
            ]);

            // Check for a successful response
            if ($response->successful()) {
                $candidate = $response->json()['candidates'][0] ?? null;
                $text = $candidate['content']['parts'][0]['text'] ?? null;

                if ($text) {
                    return response()->json(['response' => $text]);
                } else {
                    return response()->json(['error' => 'No text content found in Gemini response.'], 500);
                }
            } else {
                Log::error('Gemini API call failed: ' . $response->body());
                return response()->json(['error' => 'Failed to get a response from the AI model.'], $response->status());
            }

        } catch (\Exception $e) {
            Log::error('Exception during Gemini API call: ' . $e->getMessage());
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }
}
