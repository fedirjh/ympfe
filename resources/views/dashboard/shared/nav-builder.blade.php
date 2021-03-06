  <div class="c-sidebar-brand">
    <a class="text-secondary" href="/"><i class="cil-home"></i></a>
  </div>
    <ul class="c-sidebar-nav">
                  <li class="c-sidebar-nav-dropdown">
                      <a class="c-sidebar-nav-dropdown-toggle" href="/users">
                        <i class="cil-people c-sidebar-nav-icon"></i>Management
                      </a>
                      <ul class="c-sidebar-nav-dropdown-items">
                        @if(Auth::user()->hasRole('admin'))
                          <li class="c-sidebar-nav-item">
                              <a class="c-sidebar-nav-link" href="/users">
                                Users
                              </a>
                          </li>
                        @endif
                        @if(Auth::user()->hasRole('event_manager'))
                        <li class="c-sidebar-nav-item">
                            <a class="c-sidebar-nav-link" href="/events">
                              Events
                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->hasRole('bourse_manager'))
                        <li class="c-sidebar-nav-item">
                            <a class="c-sidebar-nav-link" href="/bourses">
                              Bourses
                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->hasRole('conference_manager'))
                        <li class="c-sidebar-nav-item">
                            <a class="c-sidebar-nav-link" href="/conferences">
                              Conferences
                            </a>
                        </li>
                        @endif
                      </ul>
                  </li>
            @if(Auth::user()->hasRole('user'))
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="/events/myevents">
                      <i class="cil-newspaper c-sidebar-nav-icon"></i> My Events
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="/conferences/myconferences">
                      <i class="cil-newspaper c-sidebar-nav-icon"></i> My Conferences
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="/bourses/mybourses">
                      <i class="cil-newspaper c-sidebar-nav-icon"></i> My Bourses
                    </a>
                </li>
            @endif
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
  </div>
