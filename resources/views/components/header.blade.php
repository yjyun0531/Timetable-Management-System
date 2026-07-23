<style>

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