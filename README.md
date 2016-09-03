# slim3-auth
Module Auth Slim 3

### Installation:
You can install the library directly from composer / packagist:

    $ composer require "dilsonjlrjr/slim3-auth"
    

### Dependencies:

* [Slim Session](https://github.com/akrabat/rka-slim-session-middleware)
* PHP 7

### Usage:
The slim3 -auth uses three components in your authentication process:

* Adapter
* AuthResponse
* FacadeAuth


#### Adapters:
The adaptares are responsible for defining the authentication rules. Every adapter implements **AuthAdapterInterface** interface and uses its constructor as input. All adapter should return a type **AuthResponse** object.
Below an adapter instance.

<pre>
use SlimAuth\AuthResponse;
use SlimAuth\AuthAdapterInterface;

class AuthTestAdapter implements AuthAdapterInterface
{

    private $username;

    private $password;

    /**
     * AuthTestAdapter constructor.
     * Data entry
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    function authenticate() : AuthResponse
    {
        if ($this->username == 'username' && $this->password == 'password') {
            return new AuthResponse(AuthResponse::AUTHRESPONSE_SUCCESS, 'User auth success', 'Slim3Auth', [ 'id' => 1010 ]);
        }

        return new AuthResponse(AuthResponse::AUTHRESPONSE_FAILURE, 'Failure');
    }

}
</pre>

##### Adapters - Methods
**authenticate**

	Define:
		Authenticates according to the rules defined in the implemented class
	Params:
		no params;
	Return:
		SlimAuth\AuthResponse


<hr>

#### AuthResponse
The AuthResponse class indicates the result of the authentication process. It has constants that define states, AUTHRESPONSE_SUCCESS (Successful authentication), AUTHRESPONSE_FAILURE (Authentication failed).


##### AuthResponse - Methods
**__construct**

	Define:
		Set message result autenticate
	Params:
		$code [int] - AUTHRESPONSE_SUCCESS or AUTHRESPONSE_FAILURE;
		$message [string] - Defined user. Message result authentication;
		$keyAttributeSession [string] - Key used for session rescue;
		$attributesSession [array] - Array with attributes session;
	Return:
		no returns;

**setMessage**

	Define:
		Set message result autenticate
	Params:
		$code [int] - AUTHRESPONSE_SUCCESS or AUTHRESPONSE_FAILURE;
		$message [string] - Defined user. Message result authentication;
		$keyAttributeSession [string] - Key used for session rescue;
		$attributesSession [array] - Array with attributes session;
	Return:
		no returns;
		
**getMessage**
	
	Define:
		Get array message
	Params:
		no params;
	Return:
		no returns;
	Example:
		[
			$code, [int]
			$message, [string]
			$keyAttributeSession, [string]
			$attributesSession, [array]
		]

<hr>

#### FacadeAuth:
This facade runs an adapter set in advance and stored in session attributes set by the adapter.

##### FacadeAuth - Methods
**__construct**

	Define:
		The class constructor
	Params:
		$authAdapter [SlimAuth\AuthAdapterInterface] - implemented adapter interface SlimAuth\AuthAdapterInterface;
		$session [RKA\Session] - Stored Session

	Return:
		no returns;
		
**auth**

	Define:
		Auth method
	Params:
		no params;
	Return:
		no returns;
		
**isValid**

	Define:
		It indicates whether the authentication was valid
	Params:
		no params;
	Return:
		boolean;
		
<hr>

Contact:

	Email: dilsonjlrjr@gmail.com