<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
<<<<<<< HEAD
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cogs"></i>
=======
    <a href="{{ route('students.index') }}" class="nav-link {{ Request::is('students*') ? 'active' : '' }}">
         <i class="nav-icon fas fa-users"></i>
        <p>Etudiants</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users-cog"></i>
>>>>>>> e19bcdabde31c9174269652d945e9d8c56c6b0b4
        <p>Utilisateurs</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('settings') }}" class="nav-link {{ Request::is('settings') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cogs"></i>
        <p>Settings</p>
    </a>
</li>
