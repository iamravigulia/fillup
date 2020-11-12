<style>
    table {
        background: #fff;
        width: 100%;
        border: 0;
    }
    th {
        
    }
    td {
        border-top: 1px solid #999;
        padding: 5px;
    }
    tr:nth-child(odd) {
        background: #ddd;
    }

</style>
<table>
    <thead>
            <th>#</th>
            <th>Question</th>
            <th>Answers</th>
            <th>Hint</th>
            <th>Level</th>
            <th>Score</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Actions</th>
    </thead>
    <tbody>
        @php
            $fmt_fillupques = DB::table('fmt_fillup_ques')->get();
        @endphp
        @foreach ($fmt_fillupques as $que)
        <tr>
            <td>{{$que->id}}</td>
            <td>{{$que->question}}</td>
            <td>
                <ul>
                    @php $fmt_fillans = DB::table('fmt_fillup_ans')->where('question_id', $que->id)->get() @endphp
                    @foreach ($fmt_fillans as $ans)
                        <li @if($ans->arrange == 1) style="color:blue;" @endif >{{$ans->answer}}</li>
                    @endforeach
                </ul>
            </td>
            <td>{{$que->hint ?? '-null-'}}</td>
            <td>{{$que->level ?? '-null-'}}</td>
            <td>{{$que->score ?? '-null-'}}</td>
            <td>{{date('F d, Y',strtotime($que->created_at))}}</td>
            <td>{{date('F d, Y',strtotime($que->updated_at))}}</td>
            <td>
                <a href="javascript:void(0);" onclick="modalCMA({{$que->id}})">Edit</a>
                <a href="{{route('fmt.fillup.delete', $que->id)}}">Delete</a>
            </td>
        </tr>
        <x-fillup.edit :message="$que->id"/>
        @endforeach
    </tbody>
</table>
<script>
    function modalCMA($id){
        var modal = document.getElementById('modalCMA'+$id);
        modal.classList.remove("hidden");
    }
    function closeModalCMA($id){
        var modal = document.getElementById('modalCMA'+$id);
        modal.classList.add("hidden");
    }
</script>