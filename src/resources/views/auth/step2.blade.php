
<form action="/register/step2" method="post">
  <table>
  @csrf
  <tr>
      <th>weight</th>
      <td><input type="text" name="weight"></td>
    </tr>
    @if ($errors->has('weight'))
    <tr>
        <td>
            {{$errors->first('weight')}}
        </td>
    </tr>
    @endif
    
    <tr>
      <th>target_weight</th>
      <td><input type="text" name="target_weight"></td>
    </tr>
    @if ($errors->has('target_weight'))
    <tr>
        <td>
            {{$errors->first('target_weight')}}
        </td>
    </tr>
    @endif   
    
    <tr>
      <th></th>
      <td><button>送信</button></td>
    </tr>
  </table>
</form>
