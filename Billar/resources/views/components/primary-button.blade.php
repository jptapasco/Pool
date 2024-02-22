<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-outline-light']) }}>
    {{ $slot }}
</button>
