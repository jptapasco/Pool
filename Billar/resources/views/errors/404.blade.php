@extends('errors::minimal')

@section('title', 'Eror 404')
@section('code', '404')
@section('message', 'Esta página no existe')

@section('error-desc')
    <?php

        use App\Livewire\Actions\Logout;
        use Livewire\Volt\Component;

        new class extends Component
        {
            /**
             * Log the current user out of the application.
             */
            public function logout(Logout $logout): void
            {
                $logout();

                $this->redirect('/', navigate: true);
            }
        };
    ?>

    <hr class="border-t dark:border-gray-700">
    Por favor notifique al administrador de la aplicación con el siguiente mensaje de error: <br>
    <div class="text-center mt-4">
        <button wire:click="logout" class="btn">Inicie sesión nuevamente</button>
    </div>
@endsection