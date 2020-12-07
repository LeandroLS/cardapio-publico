<template>
  <div class="min-h-screen bg-gray-100">
    <nav class="bg-white border-b border-gray-100">
      <!-- Primary Navigation Menu -->
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
              <inertia-link :href="route('cardapio')">
                <svg class="h-8 fill-current inline" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="45.005px" height="45.005px"
                        viewBox="0 0 45.005 45.005" style="enable-background:new 0 0 45.005 45.005;"
                        xml:space="preserve">
                        <g>
                            <path d="M30.249,38.414l-7.399,2.664c-0.113,0.041-0.232,0.062-0.35,0.062s-0.237-0.021-0.35-0.062l-7.697-2.771
		c2.616-2.811,5.431-5.64,8.047-8.45C25.148,32.702,27.6,35.565,30.249,38.414z M44.562,4.052c-0.275-0.192-0.627-0.241-0.941-0.126
		L22.5,11.53L1.378,3.926C1.063,3.812,0.711,3.86,0.437,4.052C0.163,4.248,0,4.562,0,4.897v27.481c0,0.435,0.272,0.822,0.681,0.969
		l11.283,4.063c3.099-2.886,6.198-5.771,9.297-8.654c-0.977-1.049-1.953-2.101-2.93-3.148c-2.063,1.479-5.119,0.917-6.957-1.352
		c-1.976-2.395-3.682-6.674-2.031-8.427c1.753-1.652,6.034,0.056,8.427,2.031c2.269,1.839,2.832,4.893,1.352,6.956
		c1.062,0.989,2.315,1.944,3.378,2.935c0.996-0.928,1.796-1.818,2.791-2.743c-0.84-1.435-0.283-3.444,1.084-4.591
		c1.562-1.312,7.357-6.287,7.516-6.129c0.154,0.155-3.91,3.995-6.625,6.718l0.453,0.452c2.898-2.54,6.992-6.35,7.148-6.195
		c0.154,0.156-3.783,4.122-6.408,6.936l0.449,0.45c2.811-2.629,6.775-6.567,6.932-6.413c0.154,0.157-3.654,4.249-6.195,7.148
		l0.449,0.449c2.725-2.715,6.562-6.783,6.717-6.626c0.156,0.157-6.117,7.509-6.125,7.52c0-0.001,1.332-1.563-0.004-0.004
		c-1.275,1.493-3.182,1.945-4.59,1.084c-0.914,0.982-1.826,1.963-2.741,2.944c3.137,2.921,6.274,5.84,9.413,8.761l11.559-4.162
		c0.41-0.146,0.683-0.534,0.683-0.969V4.897C44.999,4.562,44.837,4.248,44.562,4.052z" />
                        </g>

                    </svg>

                    CARDÁPIO PÚBLICO
              </inertia-link>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
              <jet-nav-link
                v-if="$page.estabelecimento"
                :href="route('cardapio.publico', $page.estabelecimento.url)"
                :active="$page.currentRouteName == 'cardapio.publico'"
              >
                Visualizar Cardapio
              </jet-nav-link>
              <jet-nav-link
                :href="route('estabelecimento')"
                :active="$page.currentRouteName == 'estabelecimento'"
              >
                Estabelecimento
              </jet-nav-link>

              <jet-nav-link
                v-if="$page.estabelecimento"
                :href="route('cardapio')"
                :active="$page.currentRouteName == 'cardapio'"
              >
                Cardápio
              </jet-nav-link>
              <jet-nav-link
                v-if="$page.estabelecimento"
                :href="route('cardapio.links')"
                :active="$page.currentRouteName == 'cardapio.links'"
              >
                Compartilhar
              </jet-nav-link>
<!-- 
              <jet-nav-link
                :href="route('dashboard')"
                :active="$page.currentRouteName == 'dashboard'"
              >
                Dashboard
              </jet-nav-link> -->
            </div>
          </div>

          <!-- Settings Dropdown -->
          <div class="hidden sm:flex sm:items-center sm:ml-6">
            <div class="ml-3 relative">
              <jet-dropdown align="right" width="48">
                <template #trigger>
                  <button
                    v-if="$page.jetstream.managesProfilePhotos"
                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
                  >
                    <img
                      class="h-8 w-8 rounded-full object-cover"
                      :src="$page.user.profile_photo_url"
                      :alt="$page.user.name"
                    />
                  </button>

                  <button
                    v-else
                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                  >
                    <div>{{ $page.user.name }}</div>

                    <div class="ml-1">
                      <svg
                        class="fill-current h-4 w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                  </button>
                </template>

                <template #content>
                  <!-- Account Management -->
                  <div class="block px-4 py-2 text-xs text-gray-400">
                    Gerenciar Conta
                  </div>

                  <jet-dropdown-link :href="route('profile.show')">
                    Perfil
                  </jet-dropdown-link>

                  <jet-dropdown-link
                    :href="route('api-tokens.index')"
                    v-if="$page.jetstream.hasApiFeatures"
                  >
                    API Tokens
                  </jet-dropdown-link>

                  <div class="border-t border-gray-100"></div>

                  <!-- Team Management -->
                  <template v-if="$page.jetstream.hasTeamFeatures">
                    <div class="block px-4 py-2 text-xs text-gray-400">
                      Manage Team
                    </div>

                    <!-- Team Settings -->
                    <jet-dropdown-link
                      :href="route('teams.show', $page.user.current_team)"
                    >
                      Team Settings
                    </jet-dropdown-link>

                    <jet-dropdown-link
                      :href="route('teams.create')"
                      v-if="$page.jetstream.canCreateTeams"
                    >
                      Create New Team
                    </jet-dropdown-link>

                    <div class="border-t border-gray-100"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                      Switch Teams
                    </div>

                    <template v-for="team in $page.user.all_teams">
                      <form @submit.prevent="switchToTeam(team)">
                        <jet-dropdown-link as="button">
                          <div class="flex items-center">
                            <svg
                              v-if="team.id == $page.user.current_team_id"
                              class="mr-2 h-5 w-5 text-green-400"
                              fill="none"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              stroke="currentColor"
                              viewBox="0 0 24 24"
                            >
                              <path
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                              ></path>
                            </svg>
                            <div>{{ team.name }}</div>
                          </div>
                        </jet-dropdown-link>
                      </form>
                    </template>

                    <div class="border-t border-gray-100"></div>
                  </template>

                  <!-- Authentication -->
                  <form @submit.prevent="logout">
                    <jet-dropdown-link as="button"> Sair </jet-dropdown-link>
                  </form>
                </template>
              </jet-dropdown>
            </div>
          </div>

          <!-- Hamburger -->
          <div class="-mr-2 flex items-center sm:hidden">
            <button
              @click="showingNavigationDropdown = !showingNavigationDropdown"
              class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
            >
              <svg
                class="h-6 w-6"
                stroke="currentColor"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  :class="{
                    hidden: showingNavigationDropdown,
                    'inline-flex': !showingNavigationDropdown,
                  }"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
                <path
                  :class="{
                    hidden: !showingNavigationDropdown,
                    'inline-flex': showingNavigationDropdown,
                  }"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Responsive Navigation Menu -->
      <div
        :class="{
          block: showingNavigationDropdown,
          hidden: !showingNavigationDropdown,
        }"
        class="sm:hidden"
      >
        <div class="pt-2 pb-3 space-y-1">
          <jet-responsive-nav-link
            v-if="$page.estabelecimento"
            :href="route('cardapio.publico', $page.estabelecimento.url)"
            :active="$page.currentRouteName == 'cardapio.publico'"
          >
            Visualizar Cardapio
          </jet-responsive-nav-link>
          <jet-responsive-nav-link
            :href="route('estabelecimento')"
            :active="$page.currentRouteName == 'estabelecimento'"
          >
            Estabelecimento
          </jet-responsive-nav-link>

          <jet-responsive-nav-link
           v-if="$page.estabelecimento"
            :href="route('cardapio')"
            :active="$page.currentRouteName == 'cardapio'"
          >
            Cardápio
          </jet-responsive-nav-link>
          <jet-responsive-nav-link  v-if="$page.estabelecimento"
            :href="route('cardapio.links')"
            :active="$page.currentRouteName == 'cardapio.links'"
          >
            Compartilhar
          </jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
          <div class="flex items-center px-4">
            <div class="flex-shrink-0">
              <img
                class="h-10 w-10 rounded-full"
                :src="$page.user.profile_photo_url"
                :alt="$page.user.name"
              />
            </div>

            <div class="ml-3">
              <div class="font-medium text-base text-gray-800">
                {{ $page.user.name }}
              </div>
              <div class="font-medium text-sm text-gray-500">
                {{ $page.user.email }}
              </div>
            </div>
          </div>

          <div class="mt-3 space-y-1">
            <jet-responsive-nav-link
              :href="route('profile.show')"
              :active="$page.currentRouteName == 'profile.show'"
            >
              Perfil
            </jet-responsive-nav-link>

            <jet-responsive-nav-link
              :href="route('api-tokens.index')"
              :active="$page.currentRouteName == 'api-tokens.index'"
              v-if="$page.jetstream.hasApiFeatures"
            >
              API Tokens
            </jet-responsive-nav-link>

            <!-- Authentication -->
            <form method="POST" @submit.prevent="logout">
              <jet-responsive-nav-link as="button">
                Sair
              </jet-responsive-nav-link>
            </form>

            <!-- Team Management -->
            <template v-if="$page.jetstream.hasTeamFeatures">
              <div class="border-t border-gray-200"></div>

              <div class="block px-4 py-2 text-xs text-gray-400">
                Manage Team
              </div>

              <!-- Team Settings -->
              <jet-responsive-nav-link
                :href="route('teams.show', $page.user.current_team)"
                :active="$page.currentRouteName == 'teams.show'"
              >
                Team Settings
              </jet-responsive-nav-link>

              <jet-responsive-nav-link
                :href="route('teams.create')"
                :active="$page.currentRouteName == 'teams.create'"
              >
                Create New Team
              </jet-responsive-nav-link>

              <div class="border-t border-gray-200"></div>

              <!-- Team Switcher -->
              <div class="block px-4 py-2 text-xs text-gray-400">
                Switch Teams
              </div>

              <template v-for="team in $page.user.all_teams">
                <form @submit.prevent="switchToTeam(team)" :key="team.id">
                  <jet-responsive-nav-link as="button">
                    <div class="flex items-center">
                      <svg
                        v-if="team.id == $page.user.current_team_id"
                        class="mr-2 h-5 w-5 text-green-400"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        ></path>
                      </svg>
                      <div>{{ team.name }}</div>
                    </div>
                  </jet-responsive-nav-link>
                </form>
              </template>
            </template>
          </div>
        </div>
      </div>
    </nav>

    <!-- Page Heading -->
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <slot name="header"></slot>
      </div>
    </header>

    <!-- Page Content -->
    <main>
      <slot></slot>
    </main>

    <!-- Modal Portal -->
    <portal-target name="modal" multiple> </portal-target>
  </div>
</template>

<script>
import JetApplicationLogo from "./../Jetstream/ApplicationLogo";
import JetApplicationMark from "./../Jetstream/ApplicationMark";
import JetDropdown from "./../Jetstream/Dropdown";
import JetDropdownLink from "./../Jetstream/DropdownLink";
import JetNavLink from "./../Jetstream/NavLink";
import JetResponsiveNavLink from "./../Jetstream/ResponsiveNavLink";
import JetButton from "./../Jetstream/Button";

export default {
  components: {
    JetApplicationLogo,
    JetApplicationMark,
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink,
    JetButton,
  },

  data() {
    return {
      showingNavigationDropdown: false,
    };
  },

  methods: {
    switchToTeam(team) {
      this.$inertia.put(
        route("current-team.update"),
        {
          team_id: team.id,
        },
        {
          preserveState: false,
        }
      );
    },

    logout() {
      axios.post(route("logout").url()).then((response) => {
        window.location = "/";
      });
    },
  },

  computed: {
    path() {
      return window.location.pathname;
    },
  },
};
</script>
