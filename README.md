# Laravel Collection Net Promoter Score Macro

Calculate Net Promoter Score (NPS) from a Collection.

Given a collection of numbers just add `->nps()` and it will spit out an NPS score.

`collect([1,2,3,4,5,6,7,8,9,0,10])->nps(); // -45`

Any values not in the range of integers from 0-10 will be ignored.

`collect([1,2,3,4,5,6,7,8,9,0,10,-1,99,null,false,'boo'])->nps(); // -45`

## License

License is public domain. Do what you wish. But if you fancy linking to us at `quarterdeck.co.uk` to help with our Google Juice as a thank you then it would be very much appreciated.

Be lucky.
