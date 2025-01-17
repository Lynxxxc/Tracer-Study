    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Admin</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f9;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            .login-container {
                background-color: white;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 400px;
                text-align: center;
            }

            h2 {
                margin-bottom: 20px;
                font-size: 24px;
                color: #333;
            }

            .error-message {
                background-color: #f8d7da;
                color: #721c24;
                padding: 10px;
                border-radius: 5px;
                margin-bottom: 20px;
            }

            ul {
                list-style-type: none;
                padding: 0;
            }

            li {
                margin: 5px 0;
            }

            label {
                display: block;
                text-align: left;
                font-size: 14px;
                margin-bottom: 5px;
                color: #555;
            }

            input {
                width: 100%;
                padding: 12px;
                margin: 10px 0 20px 0;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
                color: #555;
            }

            button {
                width: 100%;
                padding: 12px;
                background-color: #007BFF;
                border: none;
                border-radius: 5px;
                color: white;
                font-size: 16px;
                cursor: pointer;
            }

            button:hover {
                background-color: #0056b3;
            }

            .footer {
                margin-top: 20px;
                font-size: 14px;
                color: #777;
            }

            .footer a {
                color: #007BFF;
                text-decoration: none;
            }

            .footer a:hover {
                text-decoration: underline;
            }
        </style>
    </head>

    <body>
        <div class="login-container">
            <h2>Login Admin</h2>

            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>

                <button type="submit">Login</button>
            </form>

            <div class="footer">
                <p>Forgot your password? <a href="#">Reset it here</a></p>
            </div>
        </div>
    </body>

    </html>
