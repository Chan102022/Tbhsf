<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trinidad Boarding House Dashboard</title>
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
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    header {
      background-color: #1a252f;
      padding: 20px 40px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.3);
    }

    header h1 {
      font-size: 26px;
      color: #1abc9c;
      text-shadow: 0 0 8px #1abc9c88;
    }
    header h2 {
      color: #a0d8ef;
      margin-top: 5px;
    }

    nav {
      background-color: #34495e;
      padding: 15px 40px;
      display: flex;
      gap: 30px;
      border-bottom: 2px solid #1abc9c33;
      align-items: center;
    }

    nav a {
      color: #a0d8ef;
      text-decoration: none;
      font-weight: 600;
      font-size: 1rem;
      letter-spacing: 0.5px;
      transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    nav a:hover {
      color: #1abc9c;
      text-shadow: 0 0 6px #1abc9caa;
    }

    .main-container {
      display: flex;
      flex: 1;
    }

    .sidebar {
      width: 250px;
      background-color: #1f2f3a;
      padding: 20px;
      border-right: 2px solid #1abc9c33;
      box-shadow: 4px 0 10px rgba(0,0,0,0.3);
    }

    .sidebar h3 {
      color: #1abc9c;
      font-size: 1.2rem;
      margin-bottom: 15px;
      text-shadow: 0 0 6px #1abc9c77;
      border-bottom: 1px solid #1abc9c33;
      padding-bottom: 10px;
    }

    .dropdown {
      margin-bottom: 15px;
    }

    .dropdown-btn {
      background-color: #1abc9c;
      color: #ffffff;
      padding: 12px;
      width: 100%;
      border: none;
      border-radius: 6px;
      text-align: left;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .dropdown-btn:hover {
      background-color: #16a085;
      transform: translateX(4px);
    }

    .dropdown-content {
      display: none;
      flex-direction: column;
      background-color: #2c3e50;
      margin-top: 5px;
      border-radius: 6px;
      box-shadow: inset 0 0 8px rgba(0,0,0,0.4);
    }

    .dropdown-content a {
      padding: 10px 15px;
      color: #a0d8ef;
      text-decoration: none;
      font-size: 0.95rem;
      border-bottom: 1px solid #1abc9c33;
      transition: background-color 0.3s ease;
    }

    .dropdown-content a:hover {
      background-color: #1abc9c22;
      color: #1abc9c;
    }

    .content {
      flex: 1;
      padding: 40px;
    }

    .card {
      background-color: #34495e;
      border-radius: 10px;
      padding: 25px;
      margin-bottom: 25px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.3);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.4);
    }

    .card h2 {
      font-size: 1.5rem;
      color: #1abc9c;
      margin-bottom: 10px;
      text-shadow: 0 0 6px #1abc9c77;
    }

    .card ul {
      margin-top: 10px;
      list-style: disc;
      padding-left: 20px;
    }

    .card li {
      margin-bottom: 6px;
    }

    @media (max-width: 900px) {
      .main-container {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
        box-shadow: none;
        border-right: none;
        border-bottom: 2px solid #1abc9c33;
      }
    }
  </style>
</head>
<body>
  <header>
    <h1>Trinidad Boarding House System</h1>
    <h2>Welcome, Landlord/Landlady!</h2>
  </header>

  <nav>
    <a href="#">Home</a>
    <a href="#">Suggestions</a>
    <a href="#">Adding</a>
    <a href="#">Landlord Profile</a>
    <form method="POST" action="/logout" style="margin-left:auto;">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit"
        style="background:none;border:none;color:#a0d8ef;font-weight:600;font-size:1rem;cursor:pointer;"
        onmouseover="this.style.color='#1abc9c'; this.style.textShadow='0 0 6px #1abc9caa';"
        onmouseout="this.style.color='#a0d8ef'; this.style.textShadow='none';"
      >Logout</button>
    </form>
  </nav>

  <div class="main-container">
    <aside class="sidebar">
      <h3>Dashboard Menu</h3>

      <div class="dropdown">
        <button class="dropdown-btn">My Payments</button>
        <div class="dropdown-content">
          <a href="#">Make a Payment</a>
          <a href="#">Payment History</a>
          <a href="#">Outstanding Balances</a>
        </div>
      </div>

      <div class="dropdown">
        <button class="dropdown-btn">Rent History</button>
        <div class="dropdown-content">
          <a href="#">Monthly Rent Records</a>
          <a href="#">Download Receipts</a>
          <a href="#">Past Tenants’ Rent</a>
        </div>
      </div>

      <div class="dropdown">
        <button class="dropdown-btn">Maintenance Request</button>
        <div class="dropdown-content">
          <a href="#">Submit New Request</a>
          <a href="#">View Requests</a>
          <a href="#">Completed Maintenance</a>
        </div>
      </div>

      <div class="dropdown">
        <button class="dropdown-btn">Announcements / Messages</button>
        <div class="dropdown-content">
          <a href="#">View Announcements</a>
          <a href="#">Send Message to Tenants</a>
          <a href="#">Message History</a>
        </div>
      </div>

    </aside>

    <div class="content">
      <div class="card">
        <h2>Landlord/Landlady Dashboard</h2>
        <p>Manage your bookings, inquiries, and profile easily.</p>
      </div>

      <div class="card">
        <h2>Overview Cards</h2>
        <ul>
          <li>Total Rooms: 0</li>
          <li>Total Tenants: 0</li>
          <li>Vacant Rooms: 0</li>
        </ul>
      </div>
    </div>
  </div>

  <script>
    // Dropdown toggle behavior
    const dropdownBtns = document.querySelectorAll('.dropdown-btn');
    dropdownBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const dropdownContent = btn.nextElementSibling;
        dropdownContent.style.display =
          dropdownContent.style.display === 'flex' ? 'none' : 'flex';
      });
    });
  </script>
</body>
</html>
