<li class="{{ Request::is('home') ? 'active' : '' }}">
    <a href="{!! route('home') !!}"><i class="fa fa-home"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Dashboard</span></a>
</li>

<li class="{{ Request::is('profil*') ? 'active' : '' }}">
    <a href="{!! route('profil') !!}"><i class="fa fa-user"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Profil</span></a>
</li>

<li class="navigation-header">
    <span data-i18n="nav.category.layouts">--Pengaturan</span>
    <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
</li>

<li class="nav-item"><a href="#"><i class="fa fa-users"></i><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">Pengaturan User</span></a>
    <ul class="menu-content">
       
           <li class="{{ Request::is('users*') ? 'active' : '' }}">
               <a href="{!! route('users.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Akun Pengguna</span></a>
           </li>

        @role('super-admin')
            <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
                <a href="{!! route('permissions.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Permissions</span></a>
            </li>
        @endrole

        @role('super-admin')
            <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                <a href="{!! route('roles.index') !!}"><i class="icon-circle-right"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Roles</span></a>
            </li>
        @endrole
    </ul>
</li>

@role('super-admin')
<li class="nav-item"><a href="#"><i class="fa fa-database"></i><span class="menu-title font-small-4 black" data-i18n="nav.dash.main">Data Master</span></a>
    <ul class="menu-content">
        <li class="{{ Request::is('agamas*') ? 'active' : '' }}">
            <a href="{{ route('agamas.index') }}"><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Agama</span></a>
        </li>
        <li class="{{ Request::is('sukus*') ? 'active' : '' }}">
            <a href="{{ route('sukus.index') }}"><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Suku</span></a>
        </li>
        <li class="{{ Request::is('jenisKandidats*') ? 'active' : '' }}">
            <a href="{{ route('jenisKandidats.index') }}"><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Jenis Kandidat</span></a>
        </li>
        <li class="{{ Request::is('partais*') ? 'active' : '' }}">
            <a href="{{ route('partais.index') }}"><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Partai</span></a>
        </li>
    </ul>
</li>
@endrole

<li class="{{ Request::is('relawanmaps*') ? 'active' : '' }}">
    <a href="{{ route('petaRelawan') }}"><i class="fa fa-globe"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Peta Relawan</span></a>
</li>

<li class="{{ Request::is('relawans*') ? 'active' : '' }}">
    <a href="{{ route('relawans.index') }}"><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Relawan</span></a>
</li>

<li class="{{ Request::is('dpts*') ? 'active' : '' }}">
    <a href="{{ route('dpts.index') }}"><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Pendukung</span></a>
</li>

<li class="{{ Request::is('kandidats*') ? 'active' : '' }}">
    <a href="{{ route('kandidats.index') }}"><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Kandidat</span></a>
</li>

<li class="{{ Request::is('people*') ? 'active' : '' }}">
    <a href="{{ route('people.index') }}"><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Person</span></a>
</li>

<li class="{{''}}">
    <a href="/feedback"><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">FeedBack</span></a>
</li>
