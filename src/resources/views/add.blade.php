
<form action="/add" method="post">
  <table>
  @csrf
    <tr>
      <th>date</th>
      <td><input type="text" name="date"></td>
    </tr>
    <tr>
      <th>weight</th>
      <td><input type="text" name="weight"></td>
    </tr>
    <tr>
      <th>calories</th>
      <td><input type="text" name="calories"></td>
    </tr>
    <tr>
      <th>exercise_time</th>
      <td><input type="text" name="exercise_time"></td>
    </tr>
    <tr>
      <th>exercise_content</th>
      <td><input type="text" name="exercise_content"></td>
    </tr>
    <tr>
      <th>user_id</th>
      <td><input type="text" name="user_id"></td>
    </tr>
    <tr>
      <th></th>
      <td><button>送信</button></td>
    </tr>
  </table>
</form>
