 <li @class([
                        'list-group-item list-group-item-action dropdown-notifications-item',
                        'marked-as-read' => !is_null($notification->read_at),
                    ])>
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                    <span class="avatar-initial rounded-circle bg-label-warning"><i
                                            class="bx bx-task"></i></span>
                                </div>
                            </div>

                            <div class="flex-grow-1">
                                <h6 class="mb-1">
                                    <a href="#!">
                                        {!! $notification->data['name'] !!}
                                    </a>
                                </h6>
                                <p class="mb-0">
                                    {{ $notification->data['description'] }}
                                </p>
                                <small class="text-muted">
                                    {{-- {{ $owner }} --}}
                                </small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                                <a href="javascript:void(0)" class="dropdown-notifications-read">
                                    <span class="badge badge-dot bg-primary"></span>

                                </a>
                                <a href="javascript:void(0)" class="dropdown-notifications-read">
                                    <small class="text-muted">
                                        {{ short_date_name($notification->created_at->diffForHumans()) }}
                                    </small>

                                </a>
                                <a href="#!" wire:click="makeItRead({{ $notification }})"
                                    class="dropdown-notifications-archive"><span
                                        class="bx bx-check-circle text-success"></span></a>
                            </div>
                        </div>
                    </li>
