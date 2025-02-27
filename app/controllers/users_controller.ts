import User from '#models/user'
import type { HttpContext } from '@adonisjs/core/http'
import Hash from '@adonisjs/core/services/hash'

export default class UsersController {
  async store({ request }: HttpContext) {
    // eslint-disable-next-line @typescript-eslint/naming-convention
    const { name, first_surname, second_surname, username, phone, date_of_birth, email, password } =
      request.all()

    const user = await User.create({
      name,
      first_surname,
      second_surname,
      username,
      phone,
      date_of_birth,
      email,
      password,
    })

    return {
      message: 'User registered successfully',
      data: user,
    }
  }

  async login({ request }: HttpContext) {
    const { username, password } = request.all()

    const user = await User.query().where('username', username).first()

    if (!user) {
      return { message: 'User not found' }
    }

    // Verifica si la contraseña proporcionada coincide con la almacenada
    const isValidPassword = await Hash.verify(user.password, password)

    if (isValidPassword) {
      return {
        message: 'Login successful',
        user,
      }
    } else {
      return {
        message: 'Invalid credentials',
      }
    }
  }
}
