<?php

namespace App\Livewire;

use Livewire\Component;

class TestPrep extends Component
{
    // Public properties for the chat interface
    public $isOpen = false;
    public $messages = [];
    public $messageText = '';
    public $isLoading = false;

    // This method is called when the component is initialized
    public function mount()
    {
        // Greet the user with a welcome message on mount
        $this->messages[] = [
            'role' => 'assistant',
            'text' => 'Hello! I am TestPrep, your study assistant. How can I help you today?'
        ];
    }

    // Opens or closes the chat window
    public function toggleChat()
    {
        $this->isOpen = !$this->isOpen;
    }

    // Sends a message to the assistant
    public function sendMessage()
    {
        // Don't send empty messages
        if (trim($this->messageText) === '') {
            return;
        }

        // Add the user's message to the chat history
        $this->messages[] = [
            'role' => 'user',
            'text' => $this->messageText
        ];

        // Start the loading state
        $this->isLoading = true;

        // Store the user's message and clear the input field immediately
        $userMessage = $this->messageText;
        $this->messageText = '';

        // Call the AI model and get a response
        $assistantResponse = $this->callGeminiAPI($userMessage);

        // Add the assistant's response to the chat history
        $this->messages[] = [
            'role' => 'assistant',
            'text' => $assistantResponse
        ];

        // End the loading state
        $this->isLoading = false;
    }

    // Makes the API call to the Gemini model
    private function callGeminiAPI($prompt)
    {
        // 🚨 IMPORTANT: This line now gets the API key from your .env file
        $apiKey = env('GEMINI_API_KEY');

        // Provide a more helpful error if the key is missing
        if (empty($apiKey)) {
            return "I'm sorry, the Gemini API key is not configured. Please add it to your .env file.";
        }

        $apiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-preview-05-20:generateContent?key=$apiKey";

        $payload = json_encode([
            'contents' => [
                [
                    'role' => 'user',
                    'parts' => [
                        ['text' => $prompt]
                    ]
                ]
            ]
        ]);

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        // Check if the response contains the expected text
        if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
            return $data['candidates'][0]['content']['parts'][0]['text'];
        }

        // Return a fallback message if the API call fails or the response is unexpected
        return "I'm sorry, I couldn't get a response right now. Please try again later.";
    }

    public function render()
    {
        return view('livewire.test-prep');
    }
}
