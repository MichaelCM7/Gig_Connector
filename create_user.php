<?php
try {
    $user = new \App\Models\User();
    $user->name = 'Manual Test';
    $user->email = 'manual_test_4@example.com';
    $user->password = \Illuminate\Support\Facades\Hash::make('password');
    // $user->role = 'student'; // Column does not exist
    $user->save();
    echo "User created successfully: " . $user->email;
} catch (\Exception $e) {
    echo "Error creating user: " . $e->getMessage();
}
