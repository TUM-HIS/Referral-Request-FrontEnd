<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#registration-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-plus"></i><span>Registration</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="registration-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('patients.addPatient') }}">
                        <i class="bi bi-circle"></i><span>Register Patient</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('triages.addTriage') }}">
                        <i class="bi bi-circle"></i><span>Triage</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#verification-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-check2-circle"></i><span>Verification</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="verification-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Verify Patient</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Verify Referral</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#incoming-referals-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-arrow-down-left-circle"></i><span>Referrals</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="incoming-referals-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('referrals.worklist') }}">
                        <i class="bi bi-circle"></i><span>Refer patient</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('referrals.incoming') }}">
                        <i class="bi bi-circle"></i><span>Incoming Referrals</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('referral.outgoing') }}">
                        <i class="bi bi-circle"></i><span>Outgoing Referrals</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-graph-up"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="reports-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('reports.incoming-reports') }}">
                        <i class="bi bi-circle"></i><span>Incoming Referrals Reports</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reports.outgoing-reports') }}">
                        <i class="bi bi-circle"></i><span>Outgoing Referrals Reports</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reports.completed-reports') }}">
                        <i class="bi bi-circle"></i><span>Completed Referrals Reports</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

    </ul>

</aside><!-- End Sidebar-->
