<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DashboardHandleFormRequest;
use App\Models\User;

use Domain\Project\ViewModels\ProjectViewModel;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function page()
    {

        /**
         * Разделяем вход в cabinet - у каждого своя view
         */

          $user   = auth()->user();



          if($user->admin) {
              return view('admin.cabinet',
              [
                  'user' => $user,
              ]
              );
          }

          if($user->manager) {
              return view('manager.cabinet',
              [
                  'user' => $user
              ]
              );
          }



            return view('dashboard.cabinet',
                [
                    'user' => $user
                ]);



    }

    public function blocked()
    {
        /**
         *  вывод купленных проектов у пользователя, для заблдоктрованного пользователя
         */
        $user = User::find(auth()->user()->id);
        $projects  = ProjectViewModel::make()->ProjectBuyByUser($user->id);

        return view('dashboard.cabinet_blocked',
                [
                    'projects' => $projects,
                    'user' => $user,
                ]);
    }

    public function handle(DashboardHandleFormRequest $request):RedirectResponse
    {

       // dd($request->all());


        $user = User::query()
            ->where('id', auth()->user()->id)
            ->update([
                'iin' => $request->iin,
                'fio' => $request->fio,
                'phone' => $request->phone,
                'email' => ($request->email)?:auth()->user()->email,
                'nationality' => ($request->nationality)?:auth()->user()->nationality,
                'birthdate' => ($request->birthdate)?:auth()->user()->birthdate,
                'sex' => ($request->sex)?:auth()->user()->sex,
            ]);

/*        $request->session()->regenerate();
        auth()->login($user); // залогинили*/
        return redirect()->intended(route('cabinet'));
    }


    /**
     * Метод проверки роли с последеющем определением admin
     */

    public function roleAdmin()
    {

        if (role(auth()->user()->id) == 'admin') {
            $admin = 'admin';
        } else {
            $admin = '';
        }
        return $admin;

    }




}
