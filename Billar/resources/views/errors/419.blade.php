@extends('errors::minimal')

@section('title', 'Sesión vencida')
@section('code', '419')
@section('message', 'La sesión ha finalizado por inactividad. Inicie sesión nuevamente')
@section('error-desc')
    <?php
    use App\Livewire\Actions\Logout;
    use Livewire\Volt\Component;
    
    new class extends Component {
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
    <br>
    <div class="text-center mt-4">
        <button wire:click="logout" class="btn">Inicie sesión nuevamente</button>
    </div>
@endsection
