<?php

return [
  [
    'gate' => 'administrator.account',
    'name' => 'Account',
    'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
    'route' => null,
    'isActive' => null,
    /**
     * You can use fontawesome or svg file, the svg file is viewable in the resources/assets/icons directory
     * Example to Custom SVG file 'icon' => 'somefolder.customsvgfile' --> resources/assets/icons/somefolder/customsvgfile.svg 
     * Exampe for fontawesome 'icon' => 'fas fa-user',
     */
    'icon' => 'user-group',
    'id' => '',
    'gates' => [],
    'submenus' => [

      [
        'gate' => 'administrator.account.admin.index',
        'name' => 'Users',
        'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        /**
         * Declaration route Example
         * ['administrator.account.admin.show', ['uuid-uuid-uuid', 'foo' => 'bar']] --> https://domain.com/administrator/account/admin/uuid-uuid-uuid?foo=bar
         */
        'route' => ['administrator.account.admin.index', []],
        'isActive' => 'account/admin*',
        'id' => '',
        'gates' => [
          [
            'gate' => 'administrator.account.admin.create',
            'title' => 'Create user',
            'description' => 'User can create new admin'
          ],
          [
            'gate' => 'administrator.account.admin.update',
            'title' => 'Update user',
            'description' => 'User can update admin'
          ],
          [
            'gate' => 'administrator.account.admin.destroy',
            'title' => 'Delete user',
            'description' => 'User can delete account'
          ]
        ],
      ]

    ]
  ],

  [
    'gate' => 'administrator.access',
    'name' => 'Access',
    'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
    'route' => null,
    'isActive' => null,
    'icon' => 'lock-open',
    'id' => '',
    'gates' => [],
    'submenus' => [

      [
        'gate' => 'administrator.access.role.index',
        'name' => 'Role',
        'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        'route' => ['administrator.access.role.index', []],
        'isActive' => 'access/role*',
        'id' => '',
        'gates' => [
          [
            'gate' => 'administrator.access.role.create',
            'title' => 'Create Role',
            'description' => 'User can create new role'
          ],
          [
            'gate' => 'administrator.access.role.update',
            'title' => 'Update Role',
            'description' => 'User can update role'
          ],
          [
            'gate' => 'administrator.access.role.destroy',
            'title' => 'Delete Role',
            'description' => 'User can delete role'
          ]
        ],
      ],

      [
        'gate' => 'administrator.access.permission.index',
        'name' => 'Permission',
        'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        'route' => ['administrator.access.permission.index', []],
        'isActive' => 'access/permission*',
        'id' => '',
        'gates' => [
          [
            'gate' => 'administrator.access.permission.show',
            'title' => 'Views detail Permission',
            'description' => 'User can view detail for all permission'
          ],
          [
            'gate' => 'administrator.access.permission.assign',
            'title' => 'Assign Permission',
            'description' => 'User can assign for all permission'
          ],

        ],
      ]
    ]
  ],

  // Creation
  [
    'gate' => 'administrator.data',
    'name' => 'Data',
    'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
    'route' => null,
    'isActive' => null,
    'icon' => 'cube',
    'id' => '',
    'gates' => [],
    'submenus' => [

      [
        'gate' => 'administrator.data.creation.index',
        'name' => 'Creation',
        'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        'route' => ['administrator.data.creation.index', []],
        'isActive' => 'data/creation*',
        'id' => '',
        'gates' => [
          [
            'gate' => 'administrator.data.creation.create',
            'title' => 'Create Creation',
            'description' => 'User can create new creation'
          ],
          [
            'gate' => 'administrator.data.creation.update',
            'title' => 'Update Creation',
            'description' => 'User can update creation'
          ],
          [
            'gate' => 'administrator.data.creation.destroy',
            'title' => 'Delete Creation',
            'description' => 'User can delete creation'
          ]
        ],
      ],

      // Photo Creation
      [
        'gate' => 'administrator.data.photocreation.index',
        'name' => 'Photo Creation',
        'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        'route' => ['administrator.data.photocreation.index', []],
        'isActive' => 'data/photocreation*',
        'id' => '',
        'gates' => [
          [
            'gate' => 'administrator.data.photocreation.create',
            'title' => 'Create Photo Creation',
            'description' => 'User can create new photo creation'
          ],
          [
            'gate' => 'administrator.data.photocreation.update',
            'title' => 'Update Photo Creation',
            'description' => 'User can update photo creation'
          ],
          [
            'gate' => 'administrator.data.photocreation.destroy',
            'title' => 'Delete Photo Creation',
            'description' => 'User can delete photo creation'
          ]
        ],
      ],

      // Study
      [
        'gate' => 'administrator.data.study.index',
        'name' => 'Study',
        'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        'route' => ['administrator.data.study.index', []],
        'isActive' => 'data/study*',
        'id' => '',
        'gates' => [
          [
            'gate' => 'administrator.data.study.create',
            'title' => 'Create Study',
            'description' => 'User can create new study'
          ],
          [
            'gate' => 'administrator.data.study.update',
            'title' => 'Update Study',
            'description' => 'User can update study'
          ],
          [
            'gate' => 'administrator.data.study.destroy',
            'title' => 'Delete Study',
            'description' => 'User can delete study'
          ]
        ],
      ],

      // Votes
      [
        'gate' => 'administrator.data.vote.index',
        'name' => 'Vote',
        'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        'route' => ['administrator.data.vote.index', []],
        'isActive' => 'data/vote*',
        'id' => '',
        'gates' => [
          [
            'gate' => 'administrator.data.vote.show',
            'title' => 'Views detail Vote',
            'description' => 'User can view detail for all vote'
          ]
        ],
      ],
    ]
  ],

  [
    'gate' => 'administrator.system',
    'name' => 'System',
    'description' => 'System application control',
    'route' => null,
    'isActive' => null,
    'icon' => 'cog',
    'id' => '',
    'gates' => [],
    'submenus' => [
      [
        'gate' => 'administrator.system.activity.index',
        'name' => 'User Activity',
        'description' => 'List of User activity',
        'route' => ['administrator.system.activity.index', []],
        'isActive' => 'system/activity*',
        'id' => '',
        'gates' => [
          [
            'gate' => 'administrator.system.activity.delete',
            'title' => 'Delete',
            'description' => 'Delete log activity after 7 days'
          ],
        ]
      ],

      [
        'gate' => 'administrator.system.log.index',
        'name' => 'System Log',
        'description' => 'Display for Ladmin error log',
        'route' => ['administrator.system.log.index', []],
        'isActive' => 'system/log*',
        'id' => '',
        'gates' => []
      ]
    ]
  ]
];
