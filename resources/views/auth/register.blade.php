<form action="{{ route('register.store') }}" method="POST">
  @csrf
  <table>
    <tr>
      <td>
        <label for="name">Name</label>
      </td>
      <td>
        <label for="email">Email</label>
      </td>
      <td>
        <label for="password">Password</label>
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" name="name" id="name">
      </td>
      <td>
        <input type="text" name="email" id="email">
      </td>
      <td>
        <input type="text" name="password" id="password">
      </td>
    </tr>
    <tr>
      <td>
        <button type="submit">submit</button>
      </td>
    </tr>
  </table>
</form>