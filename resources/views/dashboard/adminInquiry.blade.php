<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Trinidad Boarding House - Suggestions</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #2c3e50;
            color: #a0d8ef;
            padding: 40px;
        }

        .btn-container {
            display: flex;
            gap: 30px;
            justify-content: center;
            margin-bottom: 40px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        button.suggestion-btn, a.back-btn {
            background-color: #1abc9c;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 600;
            color: #2c3e50;
            cursor: pointer;
            box-shadow: 0 4px 12px #16a085cc;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            flex: 1;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        button.suggestion-btn:hover, a.back-btn:hover {
            background-color: #16a085;
            box-shadow: 0 6px 18px #138d75dd;
        }

        .info-section {
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            background-color: #34495e;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            display: none; /* hidden by default */
        }

        .info-section.active {
            display: block;
        }

        h2 {
            color: #1abc9c;
            margin-bottom: 15px;
            text-shadow: 0 0 6px #1abc9c77;
        }

        ul {
            list-style: disc;
            padding-left: 20px;
            color: #a0d8ef;
        }

        ul li {
            margin-bottom: 8px;
        }
    </style>
</head>
<body>

    <div class="btn-container">
        <button class="suggestion-btn" onclick="showSection('tenant')">Show Tenant Suggestion</button>
        <button class="suggestion-btn" onclick="showSection('landlord')">Show Landlord Suggestion</button>
        <a href="{{ route('admin.dashboard') }}" class="back-btn">Back to Admin Dashboard</a>
    </div>

    <div id="tenant" class="info-section">
        <h2>Tenant Uploaded Info</h2>
        <ul>
            <li>Name: John Doe</li>
            <li>Contact: john@example.com</li>
            <li>Suggestion: More parking spaces</li>
            <li>Uploaded on: 2025-10-15</li>
        </ul>
    </div>

    <div id="landlord" class="info-section">
        <h2>Landlord Uploaded Info</h2>
        <ul>
            <li>Name: Mary Smith</li>
            <li>Contact: mary@boardinghouse.com</li>
            <li>Suggestion: Upgrade security system</li>
            <li>Uploaded on: 2025-10-17</li>
        </ul>
    </div>

    <script>
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.info-section').forEach(section => {
                section.classList.remove('active');
            });

            // Show selected section
            const section = document.getElementById(sectionId);
            if (section) {
                section.classList.add('active');
            }
        }
    </script>

</body>
</html>
