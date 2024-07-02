<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote of the Day</title>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes changeColor {
            0%, 100% {
                color: #fff;
            }
            50% {
                color: #ff4081;
            }
        }

        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #7b4397, #dc2430);
            color: #fff;
        }

        .container {
            text-align: center;
            padding: 20px;
            border: 3px solid #fff;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            font-size: 3em;
            margin: 0 0 20px 0;
            animation: rotate 3s linear, changeColor 6s infinite;
            animation-iteration-count: 1, infinite;
        }

        .quote {
            font-size: 1.5em;
            margin: 20px 0;
            padding: 10px;
            border: 2px solid #fff;
            border-radius: 10px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.5);
            animation: fadeIn 2s ease-in-out;
        }

        .author {
            font-size: 1.2em;
            color: #ffce00;
            animation: fadeIn 2s ease-in-out;
        }

        button, input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1em;
            color: #fff;
            background: #007bff;
            border: none;
            border-radius: 5px;
            box-shadow: 0 5px #0056b3;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover, input[type="submit"]:hover {
            background: #0056b3;
            box-shadow: 0 2px #003f7f;
        }

        form {
            margin-top: 20px;
            animation: fadeIn 3s ease-in-out;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 1em;
            border: 2px solid #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Quote of the Day</h1>
        <div class="quote" id="quote">Loading...</div>
        <div class="author" id="author"></div>
        <button onclick="getRandomQuote()">Get Random Quote</button>
        <form id="author-search-form" action="{{ route('searchQuoteByAuthor') }}" method="GET">
            <input type="text" id="author-search" name="author" placeholder="Search by Author">
            <button type="submit">Search</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', getRandomQuote);

        function getRandomQuote() {
            fetch('{{ route("randomQuote") }}')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('quote').textContent = data.quote;
                    document.getElementById('author').textContent = data.author;
                })
                .catch(error => console.error('Error fetching random quote:', error));
        }

        function searchByAuthor(event) {
            event.preventDefault();
            const author = document.getElementById('author-search').value;
            fetch(`/api/quote/search?author=${author}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        document.getElementById('quote').textContent = data[0].quote;
                        document.getElementById('author').textContent = data[0].author;
                    } else {
                        document.getElementById('quote').textContent = 'No quotes found';
                        document.getElementById('author').textContent = '';
                    }
                })
                .catch(error => console.error('Error fetching quotes by author:', error));
        }

        document.getElementById('author-search-form').addEventListener('submit', searchByAuthor);
    </script>
</body>
</html>
