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
        margin: 0 -30px;
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

        /* ===== Shared page content styling ===== */
    body { padding: 0 30px 40px 30px; }

    h2 {
        color: #1F4E79;
        font-size: 22px;
        margin: 24px 0 12px 0;
    }

    body > a, .add-link {
        display: inline-block;
        text-decoration: none;
        color: #ffffff;
        background-color: #1F4E79;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 16px;
        transition: background-color 0.2s ease;
    }
    body > a:hover, .add-link:hover {
        background-color: #163a5c;
    }

    /* ===== Tables (list pages) ===== */
    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #ffffff;
        box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        border-radius: 6px;
        overflow: hidden;
        margin-top: 10px;
    }
    th {
        background-color: #1F4E79;
        color: #ffffff;
        text-align: left;
        padding: 10px 12px;
        font-size: 13px;
    }
    td {
        padding: 10px 12px;
        border-bottom: 1px solid #eef0f3;
        font-size: 14px;
    }
    tr:hover td { background-color: #f7f9fc; }

    td a {
        text-decoration: none;
        color: #1F4E79;
        font-weight: 600;
        margin-right: 10px;
        font-size: 13px;
    }
    td a:hover { text-decoration: underline; }

    /* ===== Forms (create/edit pages) ===== */
    form {
        background-color: #ffffff;
        padding: 24px;
        border-radius: 8px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        max-width: 500px;
        margin: 20px auto;
    }

    .form-group {
        margin-bottom: 16px;
    }
    .form-group label {
        display: block;
        font-weight: 600;
        font-size: 13px;
        color: #333;
        margin-bottom: 5px;
    }
    .form-group input:not([type="checkbox"]),
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #ccd3da;
        border-radius: 5px;
        font-size: 14px;
        font-family: inherit;
    }
    .form-group input[type="checkbox"] {
        width: auto;
        margin-right: 6px;
        vertical-align: middle;
    }
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #1F4E79;
        box-shadow: 0 0 0 2px rgba(31,78,121,0.15);
    }

    button[type="submit"] {
        background-color: #1F4E79;
        color: #ffffff;
        border: none;
        padding: 10px 22px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }
    button[type="submit"]:hover { background-color: #163a5c; }

    .back-link {
        display: inline-block;
        margin-top: 14px;
        color: #ffffff;
        text-decoration: none;
        font-size: 13px;
    }
    .back-link:hover { text-decoration: underline; }

    .confirm-box {
    background-color: #ffffff;
    padding: 24px;
    border-radius: 8px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.08);
    max-width: 1000px;
    margin: 20px auto;
    text-align: center;
    }
    .confirm-box p { margin-top: 0; font-size: 15px; }
    .confirm-box form { box-shadow: none; padding: 0; margin: 0; max-width: none; }
</style>

<div class="header-bar">
    <a href="/" class="logo">Timetable Management System</a>
</div>