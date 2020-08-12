<?php
// Guest info array defined 
$guestInfo = array (
		array (
			'guest_id' => 177,
			'guest_type' => 'crew',
			'first_name' => 'Marco',
			'middle_name' => NULL,
			'last_name' => 'Burns',
			'gender' => 'M',
			'guest_booking' => array (
				array (
				'booking_number' => 20008683,
				'ship_code' => 'OST',
				'room_no' => 'A0073',
				'start_time' => 1438214400,
				'end_time' => 1483142400,
				'is_checked_in' => true,
				),
			),
			'guest_account' => array (
				array (
				'account_id' => 20009503,
				'status_id' => 2,
				'account_limit' => 0,
				'allow_charges' => true,
				),
			),
		),
		array (
			'guest_id' => 10000113,
			'guest_type' => 'crew',
			'first_name' => 'Bob Jr ',
			'middle_name' => 'Charles',
			'last_name' => 'Hemingway',
			'gender' => 'M',
			'guest_booking' => array (
				array (
				'booking_number' => 10000013,
				'room_no' => 'B0092',
				'is_checked_in' => true,
				),
			),
			'guest_account' => array (
				array (
				'account_id' => 10000522,
				'account_limit' => 300,
				'allow_charges' => true,
				),
			),
		),
		array (
			'guest_id' => 10000114,
			'guest_type' => 'crew',
			'first_name' => 'Al ',
			'middle_name' => 'Bert',
			'last_name' => 'Santiago',
			'gender' => 'M',
			'guest_booking' => array (
				array (
				'booking_number' => 10000014,
				'room_no' => 'A0018',
				'is_checked_in' => true,
				),
			),
			'guest_account' => array (
				array (
				'account_id' => 10000013,
				'account_limit' => 300,
				'allow_charges' => false,
				),
			),
		),
		array (
			'guest_id' => 10000115,
			'guest_type' => 'crew',
			'first_name' => 'Red ',
			'middle_name' => 'Ruby',
			'last_name' => 'Flowers ',
			'gender' => 'F',
			'guest_booking' => array (
				array (
				'booking_number' => 10000015,
				'room_no' => 'A0051',
				'is_checked_in' => true,
				),
			),
			'guest_account' => array (
				array (
				'account_id' => 10000519,
				'account_limit' => 300,
				'allow_charges' => true,
				),
			),
		),
		array (
		'guest_id' => 10000116,
		'guest_type' => 'crew',
		'first_name' => 'Ismael ',
		'middle_name' => 'Jean-Vital',
		'last_name' => 'Jammes',
		'gender' => 'M',
		'guest_booking' => array (
			array (
			'booking_number' => 10000016,
			'room_no' => 'A0023',
			'is_checked_in' => true,
			),
		),
		'guest_account' => array (
			array (
			'account_id' => 10000015,
			'account_limit' => 300,
			'allow_charges' => true,
			),
		),
		),
	);

/* Function to format array in user readable format
*  @param $arr array
*  @param $level integer	
*  @return void
*/
function formatData($arr, $level = 0){
    $seperator = "";
    for ($i = 0; $i < $level; $i++){
        $seperator .= "&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    foreach ($arr as $key => $val){
		$displayIndex = is_numeric($key)? ($key + 1). " :: " : $key ." => ";
        if (is_array($val)) {
            print ($seperator . $displayIndex . "<br />");
			// If its array make recursive call to format this array
            formatData($val, $level + 1);
        } else {
            if($val && $val !== 0){
                print ($seperator . $displayIndex . $val . "<br />"); 
            }
        }
    }
}

echo "<br />--------------------------------------------------Array in user readable format--------------------------------------------------<br />";
// Call function to display array after formatting
formatData($guestInfo);


/* Sorts array at nested level
*  @param $arr array
*  @return void
*/
function ksort_recursive(&$array)
{
    if (is_array($array)) {
        ksort($array);
        array_walk($array, 'ksort_recursive');
    }
}
ksort_recursive($guestInfo);

echo "<br />--------------------------------------------------Array After sorting--------------------------------------------------<br /><br />";
// Display sorted array in user readable format
formatData($guestInfo);
?>