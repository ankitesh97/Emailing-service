
import pandas as pd
import numpy
import os

email_path = '/home/ankitesh/projects/SpamFiltering/Emails/'
email_files = [x for x in os.listdir(email_path)]

to_filter = [',', '?', '!', ' ', ' ', ' '] #list of strings that will be filtered from the mails

#method to parse email files
def parse_files(email_files, email_path):
	emails = [] #will contain parsed email
	labels = []  #ham 0 - spam 1
	for e in email_files:
		email = open(email_path+e,'r')
		text = [x for x in email.read().lower().replace('\n',' ')]
		for ch in to_filter:
			text = [x.replace(ch,' ') for x in text]
		text = ''.join(text).split()
		lbl = text[-1]
		labels.append(lbl)
		del text[-1]
		emails.append(text)

	return emails,labels

def create_frequency_table(texts, labels=None, parse=False):

	frequency_table = pd.DataFrame([])
	for idx, t in enumerate(texts):
		vocab = set(t)
		d = pd.Series({v:t.count(v) for v in vocab})  #each email represents a column in the final dataframe
#series vs dataframes is like array vs multi dimensional array
		if labels != None:
			d['*class*'] = labels[idx]
		frequency_table = frequency_table.append(d,ignore_index=True)
	return frequency_table.fillna(0) #fills Nan with zeros

#train the model using frequency table
#calculates the probability of a email being a spam or ham by checking each word in the email
def train(frequency_table):

	#filter out the frequencies and labels
	frequencies = frequency_table.iloc[:, 1:]
	#filter out the labels from the frequency table
	labels = frequency_table.iloc[:, 0].values #get the values in the column
	# build the vocab
	vocab = frequencies.columns.values
	length = len(vocab)
	spam,ham = pd.DataFrame([]),pd.DataFrame([])
	for idx, row in frequencies.iterrows():
		if(labels[idx] == '1'):
			spam = spam.append(row)
		else:
			ham = ham.append(row)
	spam_probs = {} #spam words probability
	ham_probs = {}
	spam_word_count = spam.sum().sum()      #total spam words
	ham_word_count = ham.sum().sum()
	alpha = 1 #offset if the word occurence is found out to be zero
	for word in vocab:
		word_occurence_spam = spam[word].sum()  #total count of that word in spam
		word_occurence_ham = ham[word].sum()    #total count of that word in ham
		bayesian_prob_spam = (word_occurence_spam+1)/(spam_word_count+length)  #denominator doesnt matter as it is the normalizing factor
		bayesian_prob_ham = (word_occurence_ham+1)/(ham_word_count+length)
		spam_probs[word] = bayesian_prob_spam
		ham_probs[word] = bayesian_prob_ham
	return spam_probs, ham_probs

def predict(text, spam_pr, ham_pr):

	text = [x for x in text.replace('\n',' ')]
	for ch in to_filter:
		text = [x.replace(ch,' ') for x in text]
	prsd_text = [''.join(text).split()]
	txt_freq_table = create_frequency_table(prsd_text)
	vocab = txt_freq_table.columns.values
	spam_likehood = 0
	ham_likehood = 0

	for wrd in vocab:
		if wrd in spam_pr:
			spam_likehood += spam_pr[wrd]
		if wrd in ham_pr:
			ham_likehood += ham_pr[wrd]

	print spam_likehood,ham_likehood
	return ((spam_likehood/ham_likehood) >= 1)



#test the program

testmailfile = open('email_6.txt')
testmail = testmailfile.read()
emails,labels = parse_files(email_files,email_path)
freq_table = create_frequency_table(emails,labels)
spam_pr, ham_pr = train(freq_table)
prediction = predict(testmail,spam_pr,ham_pr)
print prediction