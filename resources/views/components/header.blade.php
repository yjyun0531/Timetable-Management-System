<style>
    * { box-sizing: border-box; }
    body { margin: 0; font-family: 'Segoe UI', Arial, sans-serif; background-color: #f4f6f9; color: #2b2b2b; }

    .header-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #1F4E79;
        color: #ffffff;
        padding: 14px 30px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    }
    .header-bar .logo {
        color: #ffffff;
        font-size: 20px;
        font-weight: 700;
        text-decoration: none;
        letter-spacing: 0.3px;
    }
    .header_nav a {
        color: #ffffff;
        text-decoration: none;
        font-size: 14px;
        background-color: rgba(255,255,255,0.15);
        padding: 8px 16px;
        border-radius: 6px;
        transition: background-color 0.2s ease;
    }
    .header_nav a:hover {
        background-color: rgba(255,255,255,0.3);
    }
</style>

<div class="header-bar">
    <a href="/" class="logo">Timetable Management System</a>
    
    <nav class="header_nav">
        @auth
            <a href="/logout"><span>🚪</span> Logout</a>
        @else
            <a href="/login"><span>🔑</span> Login</a>
        @endauth
    </nav>
</div>