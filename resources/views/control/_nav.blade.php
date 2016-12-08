<ul class="list-group">
    <li class="list-group-item tar-avatar">
        <a href="{{url('/control/index')}}">
            <img class="img-circle" src="{{asset('img/brand80.png')}}" alt="">
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{url('/control/index')}}">
            <span class="glyphicon glyphicon-th-large" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="Dashboard"></span>
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ action('ControlPanelController@articles') }}">
            <span class="glyphicon glyphicon-pencil" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="Articles"></span>
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{url('/control/comments')}}">
            <span class="glyphicon glyphicon-comment" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="Comments"></span>
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{url('/control/todolist')}}">
            <span class="glyphicon glyphicon-list-alt" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="TodoList"></span>
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{url('/control/user')}}">
            <span class="glyphicon glyphicon-user" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="User"></span>
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{url('/control/settings')}}">
            <span class="glyphicon glyphicon-cog" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="Settings"></span>
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{url('/control/ashcan')}}">
            <span class="glyphicon glyphicon-trash" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="Trash"></span>
        </a>
    </li>
</ul>