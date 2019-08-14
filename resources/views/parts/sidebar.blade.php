<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <router-link :to="{ name: 'index' }" class="nav-link">
                <i class="mdi mdi-home menu-icon "></i>
                <span class="menu-title">ГЛАВНАЯ</span>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link :to="{ name: 'indexCourse' }" class="nav-link ">
                <i class="mdi mdi-book-open-page-variant menu-icon "></i>
                <span class="menu-title">Курсы</span>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link :to="{ name: 'wrapperAccess' }" class="nav-link ">
                <i class="mdi mdi-account-key menu-icon "></i>
                <span class="menu-title">Доступы</span>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link :to="{ name: 'wrapperUser' }" class="nav-link ">
                <i class="mdi mdi-account-multiple menu-icon "></i>
                <span class="menu-title">Пользователи</span>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link :to="{ name: 'wrapperGroup' }" class="nav-link">
                <i class="mdi mdi-buffer menu-icon "></i>
                <span class="menu-title">Группы</span>
            </router-link>
        </li>
    </ul>
</nav>
