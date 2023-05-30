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
        </li><!-- End Tables Nav -->

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
