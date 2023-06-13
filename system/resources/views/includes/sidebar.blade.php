<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('patients.addPatient') }}">
                <i class="bi bi-person-plus"></i>
                <span>Registration</span>
            </a>
        </li><!-- End Registration Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('patients.searchPatients') }}">
                <i class="bi bi-check-circle"></i>
                <span>Verification</span>
            </a>
        </li><!-- End Verification Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-arrow-down-left-circle"></i><span>Incoming Referrals</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('referrals.index') }}">
                        <i class="bi bi-circle"></i><span>Worklist</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('referrals.incoming.reviewed') }}">
                        <i class="bi bi-circle"></i><span>Reviewed Requests</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('referrals.incoming.counterreferral') }}">
                        <i class="bi bi-circle"></i><span>Counter Referrals</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Incoming Referrals Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-arrow-up-right-circle"></i><span>Outgoing Referrals</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('referrals.worklist') }}">
                        <i class="bi bi-circle"></i><span>Worklist</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('referral.outgoing') }}">
                        <i class="bi bi-circle"></i><span>Update Requests</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('referral.outgoing') }}">
                        <i class="bi bi-circle"></i><span>Revoke Requests</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-file-bar-graph"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('reports.incoming-reports') }}">
                        <i class="bi bi-circle"></i><span>Incoming referral reports</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('referral.outgoing') }}">
                        <i class="bi bi-circle"></i><span>Outgoing referral reports</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('referral.facilities') }}">
                        <i class="bi bi-circle"></i><span>Completed referrals</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <!--<li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-arrow-up-right-circle"></i><span>Referrals</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('referrals.index') }}">
                        <i class="bi bi-circle"></i><span>Incoming Referrals</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('referral.outgoing') }}">
                        <i class="bi bi-circle"></i><span>Outgoing Referrals</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('referral.facilities') }}">
                        <i class="bi bi-circle"></i><span>Facilities</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('referral.medicalTerms') }}">
                        <i class="bi bi-circle"></i><span>Medical terms database</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('referrals.worklist') }}">
                        <i class="bi bi-circle"></i><span>Worklist</span>
                    </a>
                </li>
            </ul>
        </li>End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#patient-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-file-earmark-person"></i><span>Patients</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="patient-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('patients.addPatient') }}">
                        <i class="bi bi-circle"></i><span>Add patient</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('triages.addTriage') }}">
                        <i class="bi bi-circle"></i><span>Triage Form</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

    </ul>

</aside><!-- End Sidebar-->
