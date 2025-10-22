<div>

    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Departments</flux:heading>
        <flux:subheading size="lg" class="mb-6"> List of Departments for {{ getCompany()->name }}
        </flux:subheading>
        <flux:separator />
    </div>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full table">
                        <thead class="bg-nos-200 dark:bg-nos-800">
                            <tr>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Number of Departments</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                <tr class="text-center bg-nos-100 hover:bg-nos-200 dark:bg-nos-900 dark:hover:bg-nos-700">
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-zinc-900 dark:text-white flex justify-left">
                                        <span>{{ $department->name }}</span>
                                    </td>
                                    <td>
                                        {{ $department->designations->count() }}
                                    </td>
                                    <td>
                                        <div>
                                            <flux:button variant="filled" icon="pencil"
                                                :href="route('companies.edit', $department)" />
                                            <flux:button variant="danger" icon="trash"
                                                :href="route('companies.edit', $department)"
                                                wire:click="delete({{ $department->id }})" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $departments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>