
@section('content')
    <div class="row">
        <div class="col-md-6 order-md-2 leaders-img"><img src="{{ asset('theme/assets/Content/en/images/leader-B.svg') }}" class="img-fluid"></div>
        <div class="col-md-6 order-md-1">
            <h1 class="title">top score </h1>

            @foreach($solutions as $k => $solution)
            <div class="winner-details">
                <span class="numb">{{ ($k+1) + (($solutions->currentPage() - 1) * $solutions->perPage())  }}</span>
                <img src="{{ asset('theme/assets/Content/en/images/Medal.svg') }}">
                <p>
                    <span class="challeng-name"> {{ $solution->user->name . ' ' . $solution->user->last_name }} </span>
                    <span class="score">{{ $solution->score }}</span>

                    @php
                      $start  = new \Carbon\Carbon($solution->start_at);
                      $end    = new \Carbon\Carbon($solution->finish_at);

                      $diff_in_seconds = $end->diffInSeconds($start);

                    @endphp
                    <span class="time-taken">{{ gmdate("i:s", $diff_in_seconds) }} min</span>
                </p>
            </div>
            @endforeach

        </div>


    </div>
    <nav aria-label="...">
        <ul id="pagination" class="pagination">
            {{ $solutions->links() }}
        </ul>
    </nav>

    <script>
      $('#pagination a').on('click', function(e){
          e.preventDefault();
          var url = $(this).attr('href');
          $.post(url, $('#search').serialize(), function(data){
              $('#champion-container').html(data);
          });
      });
    </script>
@endsection
