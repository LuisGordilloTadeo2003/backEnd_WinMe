import { BaseSchema } from '@adonisjs/lucid/schema'

export default class extends BaseSchema {
  protected tableName = 'users'

  async up() {
    this.schema.createTable(this.tableName, (table) => {
      table.increments('id').notNullable()
      table.string('name', 80).nullable()
      table.string('first_surname', 80).nullable()
      table.string('second_surname', 80).nullable()
      table.string('username', 20).nullable().unique()
      table.integer('phone', 9).nullable().unique()
      table.date('date_of_birth').nullable()
      table.string('email', 254).notNullable().unique()
      table.string('password').notNullable()

      table.timestamp('created_at').notNullable()
      table.timestamp('updated_at').nullable()
    })
  }

  async down() {
    this.schema.dropTable(this.tableName)
  }
}
