<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-hover table-borderless mb-1" id="kandidats-table">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Judul</th>
                <th>Feedback</th>
            </tr>
            </thead>
            <tbody>
            @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->users->name}}</td>
                    <td>{{ $feedback->judul_feedback}}</td>
                    <td>{{ $feedback->feedback}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $feedbacks])
        </div>
    </div>
</div>
