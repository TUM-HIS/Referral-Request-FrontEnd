@extends('layouts.backend')

@section('content')

    <main id="main" class="main">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#referral-details">Referral Details</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#service-details">Service Details</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#summary">Summary</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="referral-details" role="tabpanel" aria-labelledby="referral-details-tab">
                    This tab contains the referral details e.g. history
                </div>
                <div class="tab-pane fade" id="service-details" role="tabpanel">
                   The content of the Service Details tab will be dynamically loaded here
                </div>
                <div class="tab-pane fade" id="summary" role="tabpanel" aria-labelledby="summary-tab">
                    This is the summary section
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>

        $('.nav-link').on('click', function(e) {
            e.preventDefault();
            var tabId = $(this).attr('href');
            console.log(tabId);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{ route("sendreferral") }}',
                method: 'POST',
                data: { tabId: tabId, _token: '{{ csrf_token() }}' },
                success: function(response) {
                    console.log(response.content);
                    $(tabId).html(response.content);
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr.responseText);
                }
            });

            $(this).tab('show');
        });


    </script>

@endsection
