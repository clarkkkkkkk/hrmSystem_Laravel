<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Companies</flux:heading>
        <flux:subheading size="lg" class="mb-6"> List of Companies
        </flux:subheading>
        <flux:separator />
    </div>

    <form wire:submit="save" class="my-6 w-full space-y-6">
        <flux:input label="Company Name" wire:model.live="company.name" :invalid="$errors->has('company.name')"
            type="text" />
        <flux:input label="Company Email Address" wire:model.live="company.email"
            :invalid="$errors->has('company.email')" type="email" />
        <flux:input label="Company Website" wire:model.live="company.website" :invalid="$errors->has('company.website')"
            type="url" />
        <flux:input label="Company Logo" wire:model.live="logowebsite" :invalid="$errors->has('logo')" type="file" />
        <flux:button variant="primary" type="submit">Save</flux:button>
    </form>
</div>