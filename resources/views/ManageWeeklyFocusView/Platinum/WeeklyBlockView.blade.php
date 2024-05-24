<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeeklyBlockView</title>
</head>

<style>
    body {
    font-family: 'Arial', sans-serif;
    background: #f0f4f8;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    text-align: center;
}

h1 {
    font-size: 2.5em;
    margin-bottom: 20px;
    color: #333;
}

.cards {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.card {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    width: 200px;
    cursor: pointer;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.card h2 {
    font-size: 1.5em;
    margin-bottom: 10px;
    color: #007BFF;
}

.card p {
    color: #666;
}

</style>

<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platinum Weekly Focus</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Platinum Weekly Focus</h1>
        <div class="cards">
            <div class="card" onclick="navigateTo('focus.html')">
                <h2>Focus Block</h2>
                <p>Concentrate on your studies and achieve your goals.</p>
            </div>
            <div class="card" onclick="navigateTo('admin.html')">
                <h2>Admin Block</h2>
                <p>Manage your administrative tasks efficiently.</p>
            </div>
            <div class="card" onclick="navigateTo('social.html')">
                <h2>Social Block</h2>
                <p>Connect with friends and expand your network.</p>
            </div>
            <div class="card" onclick="navigateTo('recovery.html')">
                <h2>Recovery Block</h2>
                <p>Take time to relax and recover for better performance.</p>
            </div>
        </div>
    </div>

    <script>
        function navigateTo(page) {
    window.location.href = page;
}

    </script>
</body>
</html>

</body>
</html>