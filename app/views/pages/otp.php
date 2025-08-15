<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user = $_SESSION['email'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Ticket System - Verify OTP</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Inter Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        .otp-input {
            width: 3rem;
            height: 3rem;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-md">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-2">Verify Your Account</h2>
        <p class="text-center text-gray-500 mb-6">A verification code has been sent
            to <?= htmlspecialchars($user) ?> address.</p>
        <form action="<?php echo URLROOT; ?>/auth/otp" method="POST" class="space-y-4">
            <?php if (!empty($data['error'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <?= htmlspecialchars($data['error']) ?>
                </div>
            <?php endif; ?>
            <div class="flex justify-center space-x-2">
                <input type="text" name="otp[]"
                    class="otp-input rounded-md border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                    maxlength="1">
                <input type="text" name="otp[]"
                    class="otp-input rounded-md border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                    maxlength="1">
                <input type="text" name="otp[]"
                    class="otp-input rounded-md border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                    maxlength="1">
                <input type="text" name="otp[]"
                    class="otp-input rounded-md border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                    maxlength="1">
                <input type="text" name="otp[]"
                    class="otp-input rounded-md border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                    maxlength="1">
                <input type="text" name="otp[]"
                    class="otp-input rounded-md border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                    maxlength="1">
            </div>
            <button type="submit"
                class="w-full px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md font-semibold mt-4">
                Verify Code
            </button>
        </form>
        <div class="mt-6 text-center text-gray-600">
            Didn't receive the code? <a href="#"
                class="text-blue-600 hover:text-blue-700 font-medium transition-colors">Resend Code</a>
        </div>
    </div>
    <script>
        // Get all OTP input fields
        const otpInputs = document.querySelectorAll('.otp-input');

        otpInputs.forEach((input, index) => {
            // Move to the next input field on keyup
            input.addEventListener('keyup', (e) => {
                const isBackspace = e.key === 'Backspace';

                // Check if the input is a number and not empty
                if (!isBackspace && input.value.length === input.maxLength) {
                    if (index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                }

                // If backspace is pressed and the current input is empty, move focus back
                if (isBackspace && input.value.length === 0) {
                    if (index > 0) {
                        otpInputs[index - 1].focus();
                    }
                }
            });
        });
    </script>
</body>

</html>