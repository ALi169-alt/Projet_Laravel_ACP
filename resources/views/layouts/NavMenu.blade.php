<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

<!-- <link href="../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet"> -->

<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}"> <!--icon -->

<link rel="stylesheet" href="{{asset('assets/plugins/datetimepicker/css/tempusdominus-bootstrap-4.min.css')}}">

<!-- <link rel="stylesheet" href="assets/css/select2.min.css"> -->

<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>
<body>





<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<div class="header-left">
<a href="{{url('/home')}}" class="logo">
<img src="{{asset('assetts/Images/Admin.svg')}}" width="40" height="40" alt="">
<span class="text-uppercase">{{ Auth::user()->name }}</span>
</a>
</div>


<ul class="sidebar-ul">


<li class="submenu">
<a href="#"><img src="{{asset('assets/img/sidebar/icon-3.png')}}" alt="icon"> <span>Employé</span> <span class="menu-arrow"></span></a>
<ul class="list-unstyled" style="display: none;">
<li><a href="{{url('student/create')}}"><span>Ajouter un Employé</span></a></li>
<li><a href="{{url('student')}}"><span>Tous les Employés</span></a></li>

</ul>
</li>


<li  class="submenu">
<a href="#"><img src="{{asset('assets/img/sidebar/icon-27.png')}}" alt="icon"><span>Statististique </span> <span class="menu-arrow"></span></a>
<ul class="list-unstyled" style="display: none;">

<li><a href="{{url('/home')}}"><span style="font-size: 11px;">Statististique de l'entreprise</span></a></li>

<li><a href="{{url('/acp')}}"><span>Acp</span></a></li>

</ul>
</li>




<li class="submenu">
<a href="#"><img src="{{asset('assets/img/sidebar/icon-10.png')}}" alt="icon"> <span>Parametres</span> <span class="menu-arrow"></span></a>
<ul style="display: none;">

<li>
<a href="{{url('/users')}}"> Tous les admin <span class="badge badge-pill bg-primary float-right"></span></a>
</li>

<li>
<a href="{{url('/create')}}"><span> Ajouter un Admin</span></a>
</li>
</ul>
</li>

<li >
<a href="{{url('Les_Demandes')}}"><img src="{{asset('assets/img/sidebar/icon-17.png')}}" alt="icon"><span>Services demandé</span></a>
</li>
<!-- <li>
<a href="calendar.html"><img src="{{asset('assets/img/sidebar/icon-6.png')}}" alt="icon"> <span>Calendar</span></a>
</li> -->




<!-- <li class="submenu">
<a href="#"><img src="{{asset('assets/img/sidebar/icon-10.png')}}" alt="icon"><span> Accounts </span> <span class="menu-arrow"></span></a>
<ul class="list-unstyled" style="display: none;">
<li><a href="invoices.html"><span>Invoices</span></a></li>
<li><a href="payments.html"><span>Payments</span></a></li>
<li><a href="expenses.html"><span>Expenses</span></a></li>
<li><a href="provident-fund.html"><span>Provident Fund</span></a></li>
<li><a href="taxes.html"><span>Taxes</span></a></li>
</ul>
</li> -->




<!-- 
<li class="submenu">
<a href="javascript:void(0);" class="noti-dot"><img src="{{asset('assets/img/sidebar/icon-13.png')}}" alt="icon"> <span>Management </span> <span class="menu-arrow"></span></a>
<ul style="display: none;">
<li class="submenu">
<a href="#"><span> Employees</span> <span class="menu-arrow"></span></a>
<ul class="list-unstyled" style="display: none;">
<li><a href="all-employees.html"><span>All Employees</span></a></li>
<li><a href="holidays.html"><span>Holidays</span></a></li>
<li><a href="leaves.html"><span>Leave Requests</span> <span class="badge badge-pill bg-primary float-right">1</span></a></li>
<li><a href="attendance.html"><span>Attendance</span></a></li>
<li><a href="departments.html"><span>Departments</span></a></li>
<li><a href="designations.html"><span>Designations</span></a></li>
</ul>
</li>
<li>
<a href="activities.html"><span>Activities</span></a>
</li>
<li>
<a href="users.html"><span>Users</span></a>
</li>
<li class="submenu">
<a href="#"><span> Reports </span> <span class="menu-arrow"></span></a>
<ul class="list-unstyled" style="display: none;">
<li><a href="expense-reports.html"> <span>Expense Report </span></a></li>
<li><a href="invoice-reports.html"> <span>Invoice Report</span> </a></li>
</ul>
</li>
</ul>
</li> -->
<li>

<div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <img src="{{asset('assets/img/sidebar/icon-2.png')}}" alt="icon">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
</li>




<!-- <li class="submenu">
<a href="#"><img src="{{asset('assets/img/sidebar/icon-27.png')}}" alt="icon"> <span> Chart</span> <span class="menu-arrow"></span></a>
<ul class="list-unstyled" style="display: none;">
<li><a href="chart-apex.html">Apex Charts</a></li>
<li><a href="chart-js.html">Chart Js</a></li>
<li><a href="chart-morris.html">Morris Charts</a></li>
<li><a href="chart-flot.html">Flot Charts</a></li>
<li><a href="chart-peity.html">Peity Charts</a></li>
<li><a href="chart-c3.html">C3 Charts</a></li>
</ul>
</li> -->






</ul>
</li>
</ul>
</div>
</div>
</div>


<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
 
<script src="{{asset('assets/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/moment.min.js')}}"></script>



<script src="{{asset('assets/js/fullcalendar.min.js')}}"></script>
<script src="assets/js/jquery.fullcalendar.js"></script>

<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael-min.js"></script>
<script src="assets/js/apexcharts.js"></script>
<script src="assets/js/chart-data.js"></script>




<script src="assets/plugins/datetimepicker/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="{{asset('assets/js/app.js')}}"></script> <!--  ce scripte très imporatnt -->

@yield('content')
    
</body>
</html>