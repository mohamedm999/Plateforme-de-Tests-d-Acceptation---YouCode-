<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Candidate Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Welcome, {{ Auth::user()->name }}!</h3>

                    @if (count($tests ?? []) > 0)
                        <div class="mb-6">
                            <h4 class="text-md font-medium mb-2">Your Upcoming Tests</h4>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Test Name</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Date</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($tests ?? [] as $test)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $test->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $test->scheduled_at->format('M d, Y H:i') }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if ($test->status === 'pending')
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                                    @elseif($test->status === 'completed')
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                                    @elseif($test->status === 'in_progress')
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">In
                                                            Progress</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if ($test->status === 'pending' && $test->can_start)
                                                        <a href="{{ route('candidate.tests.start', $test->id) }}"
                                                            class="text-indigo-600 hover:text-indigo-900">Start Test</a>
                                                    @elseif($test->status === 'in_progress')
                                                        <a href="{{ route('candidate.tests.continue', $test->id) }}"
                                                            class="text-indigo-600 hover:text-indigo-900">Continue</a>
                                                    @elseif($test->status === 'completed')
                                                        <a href="{{ route('candidate.tests.results', $test->id) }}"
                                                            class="text-indigo-600 hover:text-indigo-900">View
                                                            Results</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="bg-gray-50 rounded-lg p-6 text-center">
                            <p class="text-gray-500">You don't have any scheduled tests yet.</p>
                        </div>
                    @endif

                    <div class="mt-6">
                        <h4 class="text-md font-medium mb-2">Your Profile</h4>
                        <div class="bg-gray-50 rounded-lg p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600">Email</p>
                                    <p class="font-medium">{{ Auth::user()->email }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Account Created</p>
                                    <p class="font-medium">{{ Auth::user()->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href=""
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
