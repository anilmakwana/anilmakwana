@include('include.header')

<body class="fixed-left">
<div id="wrapper" class="main-wrapper d-flex"><!-- #BeginLibraryItem "/Library/left-sidebar-hr.lbi" -->
  <div id="slidemenu" class="left side-menu nav-menu">
    <div class="nav-wrapper">
      <ul class="nav flex-column logout-container">
        <li class="nav-item dropdown"> <a class="company-section nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">
          <div class="bg-white p-10 m-0 rounded-circle text-primary lineheight1"><i class="far fa-building"></i></div>
          <div class="nav-menu-text d-inline-block ml-10"><span class="d-block menu-title">{{-- {{Auth::guard('adminlogin')->user()->name}} --}}</span></div>
          </a>
          <div class="dropdown-menu"> <a class="dropdown-item" href="javascript:void(0)">Projects &amp; Permanent Tasks</a> <a class="dropdown-item" href="javascript:void(0)">User Settings</a> <a class="dropdown-item" href="javascript:void(0)">Payoneer Settings</a> <a class="dropdown-item" href="javascript:void(0)">Work Schedules</a> <a class="dropdown-item" href="javascript:void(0)">Your Integrations</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="login.html">Sign Out</a> </div>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link" href="{{route('productList')}}"><i class="far fa-chart-bar"></i><span class="nav-menu-text">Product</span></a> </li>
        <li class="nav-item"><a class="nav-link" href="{{route('categoryList')}}"><i class="fas fa-users"></i><span class="nav-menu-text">Category</span></a> </li>

       
     


         <li class="nav-item"><a class="nav-link" href="{{route('logout')}}"><i class="fas fa-sliders-h"></i><span class="nav-menu-text">Logout</span></a> </li>
        <!--<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sliders-h"></i><span class="nav-menu-text">Settings</span></a>
				<div class="dropdown-menu"> <a class="dropdown-item" href="../requisition.html">Department</a> <a class="dropdown-item" href="../candidate.html">Core</a> <a class="dropdown-item" href="../user-list.html">User</a></div>
            </li>--> 
        <!--<li class="nav-item"><a class="nav-link" href="../assets.html"><i class="fas fa-box"></i><span class="nav-menu-text">Assets</span></a></li>
            <li class="nav-item"><a class="nav-link" href="javascript:void()"><i class="fas fa-plane"></i><span class="nav-menu-text">Travel</span></a></li>
            <li class="nav-item"><a class="nav-link" href="javascript:void()"><i class="fas fa-chalkboard-teacher"></i><span class="nav-menu-text">Training</span></a></li>
            <li class="nav-item"><a class="nav-link" href="../incident.html"><i class="far fa-hand-paper"></i><span class="nav-menu-text">Incident</span></a></li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sliders-h"></i><span class="nav-menu-text">Configurations</span></a>
                <div class="dropdown-menu"> <a class="dropdown-item" href="../configure-leave.html">Leave</a> <a class="dropdown-item" href="../configure-service-request.html">Service Request</a> <a class="dropdown-item" href="../configure-holidays.html">Holidays</a> <a class="dropdown-item" href="../configure-expense.html">Expense</a> <a class="dropdown-item" href="../configure-policy.html">Policy</a> <a class="dropdown-item" href="../configure-announcement.html">Announcement</a> </div>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-chart-pie"></i><span class="nav-menu-text">Reports</span></a>
                <div class="dropdown-menu"> <a class="dropdown-item" href="javascript:void(0)">Leave Report</a> <a class="dropdown-item" href="javascript:void(0)">Service Report</a> <a class="dropdown-item" href="javascript:void(0)">Expense Report</a> </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="../log-report.html"><i class="fas fa-chart-pie"></i><span class="nav-menu-text">Log Report</span></a></li>-->
      </ul>
    </div>
    <div class="fixed-bottom bg-gray">
      <button class="btn button-menu-mobile open-left pull-left btn-default m-l-40 m-r-20 bg-none f-22 p-l-5 p-r-5 p-t-10 p-b-10 menu-icon-button"><i class="fa fa-chevron-left"></i></button>
    </div>
  </div>
  <!-- #EndLibraryItem --> 
 <div class="content-wrapper hr-manager-admin">
   
  @yield('container')
  </div>
</div>
{{env('Anil')}}
<!-- Modal -->
<div class="modal fade" id="custModal" tabindex="-1" role="dialog" aria-labelledby="custModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="custModalLabel">{{trans('lang_data.jhk')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <table class="table-bordered table-striped table w-100">
          <tbody>
            <tr>
              <td>Set as a Favorite :</td>
              <td><div class="text-orange"> <i class="font-20 far fa-star"></i> </div></td>
            </tr>
            <tr>
              <td>Assign Priority :</td>
              <td><div class="text-orange"> <i class="font-20 mr-5 fas fa-flag-checkered text-danger"></i> <i class="font-20 mr-5 fas fa-flag-checkered text-primary"></i> <i class="font-20 mr-5 fas fa-flag-checkered text-success"></i> </div></td>
            </tr>
            <tr>
              <td>Move to Trash :</td>
              <td><div class="text-orange"> <i class="font-20 far fa-trash-alt"></i> </div></td>
            </tr>
          </tbody>
        </table>
        <!--<div class="d-flex flex-wrap mb-20 lineheight1">
					<div class="mr-10">Mark this checklist as my favorite :</div>
					<div class="text-orange">					
						<i class="font-20 far fa-star"></i>
					</div>
				</div>
				<div class="d-flex flex-wrap mb-20 lineheight1">
					<div class="mr-10">Flag this checklist :</div>
					<div class="text-orange">
						<i class="font-20 mr-5 fas fa-flag-checkered text-danger"></i>
						<i class="font-20 mr-5 fas fa-flag-checkered text-orange"></i>
						<i class="font-20 mr-5 fas fa-flag-checkered text-success"></i>
					</div>
				</div>
				<div class="d-flex flex-wrap mb-10 lineheight1">
					<div class="mr-10">DND this checklist :</div>
					<div class="text-orange">
						<i class="font-20 far fa-eye-slash"></i>
					</div>
				</div>--> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-orange">Save</button>
      </div>
    </div>
  </div>
</div>

</body>
@include('include.footer');