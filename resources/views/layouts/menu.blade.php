<li class="nav-item {{ Request::is('students*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('students.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Students</span>
    </a>
</li>
