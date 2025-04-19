<form action="/wight_logs/goal_setting" method="POST">
    @csrf
    <tr>
      <th>
        id
      </th>
      <td>
        <input type="hidden" name="id" value="{{$weighttarget->id}}">
      </td>
    </tr>
    <tr>
      <th>
        target_weight
      </th>
      <td>
        <input type="text" name="target_weight" value="{{$weighttarget->target_weight}}">
      </td>
    </tr>

    <td>
        <button>送信</button>
      </td>
</form>