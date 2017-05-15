<div class="profile-timeline">
    <ul class="list-unstyled">
        <li class="timeline-item">
            <div class="panel panel-white">
                <div class="panel-body">
                	<h3 class="text-center">Informasi Operator</h3>
                    <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Role</td>
                        <td>: Operator</td>
                      </tr>
                      <tr>
                        <td>Create at</td>
                        <td>: {{$user->created_at->format('d/m/Y')}}</td>
                      </tr>                   
                      <tr>
                        <td>Email</td>
                        <td>: {{$user->email}}</td>
                      </tr>
                        <td>Password</td>
                        <td>: <a href="{{route('account.setting', $user->id)}}">Ganti Password??</a>
                        </td>  
                        </tr>                   
                    </tbody>
                  </table>
                </div>
            </div>
        </li>
    </ul>
</div>