
<form action="/register/step2" method="post">
  <table>
  @csrf
    <tr>
      <th>target_weight</th>
      <td><input type="text" name="target_weight"></td>
    </tr>
    <tr>
      <th>weight</th>
      <td><input type="text" name="weight"></td>
    </tr>
    
    <tr>
      <th></th>
      <td><button>送信</button></td>
    </tr>
  </table>
</form>
