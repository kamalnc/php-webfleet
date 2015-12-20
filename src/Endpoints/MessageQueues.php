<?php
/**
 * Interface MessageQueues
 *
 * @filesource   MessageQueues.php
 * @created      13.12.2015
 * @package      TomTom\Telematics\EndpointHandler\Interfaces
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2015 Smiley
 * @license      MIT
 */

namespace TomTom\Telematics\Endpoints;

/**
 * 4.1 Message queues
 */
interface MessageQueues{

	/**
	 * 4.1.2 createQueueExtern
	 *
	 * Creates a new queue. A queue is always bound to the user creating it
	 * and collects messages matching the message class provided.
	 *
	 * Valid values are:
	 *
	 * 0  – All messages (includes tracking-only messages and 4,5,7,8)
	 * 2  – All except position messages (includes 4,5,7,8, does not include tracking-only messages)
	 * 4  – Order related messages
	 * 5  – Driver related messages
	 * 7  – Status messages
	 * 8  – Text messages
	 * 15 – Third party messages (LINK.connect, ...)
	 *
	 * @param int $msgclass
	 */
	public function createQueueExtern($msgclass = 0);

	/**
	 * 4.1.3 deleteQueueExtern
	 *
	 * Deletes an existing queue.
	 *
	 * @param int $msgclass
	 */
	public function deleteQueueExtern($msgclass = 0);

	/**
	 * 4.1.4 popQueueMessagesExtern
	 *
	 * Retrieves outstanding messages for a given subscription.
	 * This includes most important and most often occurring inbound and outbound messages.
	 *
	 * Before using popQueueMessagesExtern to retrieve outstanding messages, you need to create a queue
	 * using createQueueExtern using the same message class parameter that you are going to provide
	 * with calls to popQueueMessagesExtern.
	 * Once you have successfully processed (and stored) all of the retrieved messages,
	 * you need to use ackQueueMessagesExtern to acknowledge completion of the message transfer to your application.
	 * Otherwise, the messages will be kept and returned again during the next call to popQueueMessagesExtern.
	 * Calls to popQueueMessagesExtern and ackQueueMessagesExtern must be serialised.
	 *
	 * In order to prevent your system from being flooded with oversized responses, the number of messages
	 * that will be returned on a single response is limited to 500. This limit can be adjusted per account on request.
	 *
	 * The resulting data set is delivered in the language you have chosen in the WEBFLEET account
	 * and not on the language you have indicated in the lang parameter.
	 *
	 * @param int $msgclass
	 */
	public function popQueueMessagesExtern($msgclass = 0);

	/**
	 * 4.1.5 ackQueueMessagesExtern
	 *
	 * Acknowledges outstanding messages retrieved with a previous call to popQueueMessagesExtern.
	 *
	 * @param int $msgclass
	 */
	public function ackQueueMessagesExtern($msgclass = 0);

}
